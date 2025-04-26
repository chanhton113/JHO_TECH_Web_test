<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opportunity;
use App\Models\Pipeline;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class OpportunityController extends Controller
{
    public function index(Request $request)
    {
        Log::info('Dữ liệu gửi từ FE - index:', $request->all());

        try {
            $query = Opportunity::query();

            if ($request->filled('created_at')) {
                $query->whereDate('created_at', $request->created_at);
            }

            if ($request->filled('created_by')) {
                $query->where('created_by', $request->created_by);
            }

            if ($request->filled('manager')) {
                $query->where('manager_id', $request->manager);
            }

            if ($request->filled('search')) {
                $query->where('name', 'like', '%' . $request->search . '%');
            }

            if ($request->filled('tag')) {
                $query->whereHas('tags', function($q) use ($request) {
                    $q->where('name', 'like', '%' . $request->tag . '%');
                });
            }

            $opportunities = $query->get();

            return response()->json($opportunities);
        } catch (\Exception $e) {
            Log::error('Lỗi trong index:', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Đã xảy ra lỗi'], 500);
        }
    }

    public function store(Request $request)
    {
        if (!Auth::user()->hasRole('admin')) {
            return response()->json(['message' => 'Bạn không có quyền thực hiện thao tác này'], 403);
        }

        Log::info('Dữ liệu gửi từ FE - store:', $request->all());

        try {
            $request->validate([
                'phase' => 'required|string',
                'organisation' => 'required|string',
                'contact_id' => 'required|string',
                'name' => 'required|string',
                'value' => 'required|numeric',
                'closing_date' => 'required|date',
            ]);

            $last = Opportunity::orderByDesc(DB::raw('CAST(SUBSTRING(opportunitie_id, 2) AS UNSIGNED)'))->first();
            $nextIndex = $last ? (int)substr($last->opportunitie_id, 1) + 1 : 1;
            $opportunitie_id = 'o' . str_pad($nextIndex, 3, '0', STR_PAD_LEFT);

            $opportunity = Opportunity::create([
                'opportunitie_id' => $opportunitie_id,
                'phase' => $request->phase,
                'organisation' => $request->organisation,
                'contact_id' => $request->contact_id,
                'name' => $request->name,
                'value' => $request->value,
                'closing_date' => $request->closing_date,
                'created_by' => Auth::id(),
            ]);

            return response()->json(['message' => 'Cơ hội đã được tạo thành công', 'data' => $opportunity], 201);

        } catch (\Exception $e) {
            Log::error('Lỗi trong store:', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Đã xảy ra lỗi'], 500);
        }
    }

    public function show($id)
    {
        $opportunity = Opportunity::find($id);

        if (!$opportunity) {
            return response()->json(['message' => 'Không tìm thấy cơ hội'], 404);
        }

        return response()->json($opportunity);
    }

    public function update(Request $request, $id)
    {
        if (!Auth::user()->hasRole('admin')) {
            return response()->json(['message' => 'Bạn không có quyền thực hiện thao tác này'], 403);
        }

        $request->validate([
            'phase' => 'required|string',
            'organisation' => 'required|string',
            'contact_id' => 'required|string',
            'name' => 'required|string',
            'value' => 'required|numeric',
            'closing_date' => 'required|date',
        ]);

        $opportunity = Opportunity::where('opportunitie_id', $id)->first();

        if (!$opportunity) {
            return response()->json(['message' => 'Không tìm thấy cơ hội'], 404);
        }

        $opportunity->update($request->only(['phase', 'organisation', 'contact_id', 'name', 'value', 'closing_date']));

        return response()->json(['message' => 'Cơ hội đã được cập nhật', 'data' => $opportunity]);
    }

    public function destroy($opportunitie_id)
    {
        Log::info('Dữ liệu gửi từ FE - destroy:', ['id' => $opportunitie_id]);

        if (!Auth::user()->hasRole('admin')) {
            Log::warning('User không có quyền thực hiện thao tác này', ['user_id' => Auth::id()]);
            return response()->json(['message' => 'Bạn không có quyền thực hiện thao tác này'], 403);
        }

        try {
            $opportunity = Opportunity::find($opportunitie_id);
            if (!$opportunity) {
                Log::error('Không tìm thấy cơ hội với ID: ' . $opportunitie_id);
                return response()->json(['message' => 'Không tìm thấy cơ hội'], 404);
            }
            $opportunity->delete();
            Log::info('Cơ hội đã được xóa', ['opportunitie_id' => $opportunitie_id]);

            return response()->json(['message' => 'Cơ hội đã được xóa']);
        } catch (\Exception $e) {
            Log::error('Lỗi khi xóa cơ hội', ['error' => $e->getMessage(), 'opportunitie_id' => $opportunitie_id]);
            return response()->json(['message' => 'Đã xảy ra lỗi'], 500);
        }
    }

    public function destroyMultiple(Request $request)
    {
        Log::info('Dữ liệu từ frontend gửi lên:', $request->all());
        
        if (!Auth::user()->hasRole('admin')) {
            return response()->json(['message' => 'Bạn không có quyền thực hiện thao tác này'], 403);
        }

        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:opportunities,opportunitie_id',
        ]);

        $opportunities = Opportunity::whereIn('opportunitie_id', $request->ids)->get();

        if ($opportunities->count() !== count($request->ids)) {
            return response()->json(['message' => 'Một hoặc nhiều cơ hội không tồn tại'], 404);
        }
        Opportunity::whereIn('opportunitie_id', $request->ids)->delete();
        return response()->json(['message' => 'Các cơ hội đã được xóa']);
    }


    public function createPipeline(Request $request)
    {
        if (!Auth::user()->hasRole('admin')) {
            return response()->json(['message' => 'Bạn không có quyền thực hiện thao tác này'], 403);
        }

        $request->validate([
            'name' => 'required|string',
            'columns' => 'required|array',
            'columns.*.name' => 'required|string',
        ]);

        $pipeline = Pipeline::create(['name' => $request->name]);

        foreach ($request->columns as $column) {
            $pipeline->columns()->create(['name' => $column['name']]);
        }

        return response()->json(['message' => 'Pipeline đã được tạo thành công', 'data' => $pipeline], 201);
    }

    public function updatePipelineOrder(Request $request, $id)
    {
        if (!Auth::user()->hasRole('admin')) {
            return response()->json(['message' => 'Bạn không có quyền thực hiện thao tác này'], 403);
        }

        $request->validate([
            'columns' => 'required|array',
            'columns.*.id' => 'required|exists:pipeline_columns,id',
            'columns.*.order' => 'required|integer',
        ]);

        $pipeline = Pipeline::find($id);

        if (!$pipeline) {
            return response()->json(['message' => 'Pipeline không tìm thấy'], 404);
        }

        foreach ($request->columns as $column) {
            $col = $pipeline->columns()->find($column['id']);
            if ($col) {
                $col->update(['order' => $column['order']]);
            }
        }

        return response()->json(['message' => 'Thứ tự các cột đã được cập nhật']);
    }

    public function addTagToOpportunity(Request $request, $id)
    {
        if (!Auth::user()->hasRole('admin')) {
            return response()->json(['message' => 'Bạn không có quyền thực hiện thao tác này'], 403);
        }

        $request->validate([
            'tag_id' => 'required|exists:tags,id',
        ]);

        $opportunity = Opportunity::find($id);

        if (!$opportunity) {
            return response()->json(['message' => 'Cơ hội không tìm thấy'], 404);
        }

        $opportunity->tags()->attach($request->tag_id);

        return response()->json(['message' => 'Tag đã được gắn vào cơ hội']);
    }

    public function removeTagFromOpportunity(Request $request, $id)
    {
        if (!Auth::user()->hasRole('admin')) {
            return response()->json(['message' => 'Bạn không có quyền thực hiện thao tác này'], 403);
        }

        $request->validate([
            'tag_id' => 'required|exists:tags,id',
        ]);

        $opportunity = Opportunity::find($id);

        if (!$opportunity) {
            return response()->json(['message' => 'Cơ hội không tìm thấy'], 404);
        }

        $opportunity->tags()->detach($request->tag_id);

        return response()->json(['message' => 'Tag đã được tách khỏi cơ hội']);
    }
}
