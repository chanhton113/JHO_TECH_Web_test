<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        \Log::info('okokok: ', $request->all());
        $query = Task::query();
        if ($request->has('created_at')) {
            $query->whereDate('created_at', $request->created_at);
        }

        if ($request->has('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        if ($request->has('role')) {
            $query->whereHas('user', function($q) use ($request) {
                $q->where('role', $request->role);
            });
        }


        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        if ($request->has('start_date')) {
            $query->whereDate('start_date', $request->start_date);
        }

        $tasks = $query->with(['user', 'contact'])->get();

        return response()->json($tasks);
    }

    public function show($task_id)
    {
        $task = Task::with(['user', 'contact'])->find($task_id);

        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        return response()->json($task);
    }

    public function store(Request $request)
    {
        \Log::info('create task: ', $request->all());
        
        $request->validate([
            'title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'user_id' => 'required|exists:users,user_id',
            'status' => 'required|string',
            'end_date' => 'nullable|date',
            'contact_id' => 'required|exists:contacts,contact_id'
        ]);

        try {
            $lasttask = Task::orderByDesc(DB::raw('CAST(SUBSTRING(task_id, 6) AS UNSIGNED)'))->first();
            $lastNumber = 0;
            if ($lasttask) {
                $lastNumber = (int) substr($lasttask->task_id, 5);
            }           
            $index = $lastNumber + 1;
            $task_id = 'task_' . $index;
            \Log::info('task_id: ', ['task_id' => $task_id]);
            $task = Task::create([
                'task_id' => $task_id, 
                'title' => $request->title,
                'start_date' => $request->start_date,
                'status' => $request->status,
                'user_id' => $request->user_id, 
                'end_date' => $request->end_date,
                'contact_id' => $request->contact_id 
            ]);

            return response()->json($task, 201);
        } catch (\Exception $e) {
            \Log::error('Error creating task: ' . $e->getMessage());
            return response()->json(['error' => 'Error creating task'], 500);
        }
    }




    public function update(Request $request, $task_id)
    {
        $task = Task::find($task_id);

        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        $task->update($request->all());

        return response()->json($task);
    }


    public function destroy($task_id)
    {

        $task = Task::find($task_id);

        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }
        $task->delete();
        return response()->json(['message' => 'Task deleted successfully']);
    }

    public function destroyMultiple(Request $request)
    {
        $request->validate([
            'task_ids' => 'required|array',
            'task_ids.*' => 'exists:tasks,task_id',
        ]);
        Task::whereIn('task_id', $request->task_ids)->delete();

        return response()->json(['message' => 'Tasks deleted successfully']);
    }
}
