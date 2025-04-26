<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ContactsExport;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{

    public function index(Request $request)
    {
        \Log::info('Request data: ', $request->all());

        try {
            if (Auth::user()->role == 'admin') {
                $contacts = Contact::query();
            } else {
                $contacts = Contact::where('created_by', Auth::user()->id);
            }

            if ($request->filled('created_at')) {
                \Log::info('Filtering by created_at: ' . $request->created_at); 
                $contacts->whereDate('created_at', $request->created_at);
            }

            if ($request->filled('email')) {
                \Log::info('Filtering by email: ' . $request->email);  
                $contacts->where('email', 'like', '%' . $request->email . '%');
            }

            if ($request->filled('creator')) {
                \Log::info('Filtering by name: ' . $request->creator);  
                $contacts->where('name', 'like', '%' . $request->creator . '%');
            }

            if ($request->filled('search_text')) {
                $text = $request->search_text;
                \Log::info('Filtering by text: ' . $text);  
                $contacts->where(function ($query) use ($text) {
                    $query->where('name', 'like', '%' . $text . '%')
                        ->orWhere('email', 'like', '%' . $text . '%')
                        ->orWhere('phone', 'like', '%' . $text . '%')
                        ->orWhere('address', 'like', '%' . $text . '%')
                        ->orWhere('opportunity', 'like', '%' . $text . '%');
                });
            }

            return response()->json($contacts->get());
        } catch (\Exception $e) {
            \Log::error('Error occurred: ' . $e->getMessage());
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }

    public function show($contact_id)
    {
        $contact = Contact::find($contact_id);

        if (!$contact) {
            return response()->json(['message' => 'Contact not found'], 404);
        }


        if (Auth::user()->role !== 'admin' && $contact->created_by != Auth::id()) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        return response()->json($contact);
    }

    public function store(Request $request)
    {
        Log::info('Dữ liệu từ frontend gửi lên:', $request->all());
        $lastContact = Contact::orderByDesc(DB::raw('CAST(SUBSTRING(contact_id, 2) AS UNSIGNED)'))->first();
        $lastNumber = 0;
        if ($lastContact) {
            $lastNumber = (int) substr($lastContact->contact_id, 1);
        }
        $index = $lastNumber + 1;
        $contact_id = 'c' . str_pad($index, 3, '0', STR_PAD_LEFT);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:contacts,email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'opportunity' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            Log::error('Lỗi validation:', $validator->errors()->toArray());
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $contact = Contact::create([
            'contact_id' => $contact_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'opportunity' => $request->opportunity,
            'created_by' => Auth::id(),
        ]);

        return response()->json($contact, 201);
    }

    public function update(Request $request, $contact_id)
    {
        $contact = Contact::find($contact_id);

        if (!$contact) {
            return response()->json(['message' => 'Contact not found'], 404);
        }

        if (Auth::user()->role !== 'admin' && $contact->created_by != Auth::id()) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'opportunity' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $contact->update($request->only('name', 'email', 'phone', 'address', 'opportunity'));

        return response()->json($contact);
    }

    public function destroy($contact_id)
    {
        $contact = Contact::find($contact_id);

        if (!$contact) {
            return response()->json(['message' => 'Contact not found'], 404);
        }

        if (Auth::user()->role !== 'admin' && $contact->created_by != Auth::id()) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $contact->delete();

        return response()->json(['message' => 'Contact deleted successfully']);
    }

    public function destroyMultiple(Request $request)
    {
        Log::info('Request destroyMultiple:', $request->all());

        $payload = $request->all();

        $contactIds = $payload['ids'] ?? ($payload['contact_id'] ?? null);

        if (is_null($contactIds)) {
            return response()->json(['message' => 'No contact ID(s) provided'], 400);
        }

        if (!is_array($contactIds)) {
            $contactIds = [$contactIds];
        }

        $validator = Validator::make(['ids' => $contactIds], [
            'ids' => 'required|array|min:1',
            'ids.*' => 'exists:contacts,contact_id',
        ]);

        if ($validator->fails()) {
            Log::warning('Validation error:', $validator->errors()->toArray());
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $query = Contact::whereIn('contact_id', $contactIds);

        if (Auth::user()->role !== 'admin') {
            $query->where('created_by', Auth::id());
        }

        $deletedCount = $query->delete();

        if ($deletedCount === 0) {
            return response()->json(['message' => 'No contacts deleted.'], 404);
        }

        return response()->json(['message' => 'Contacts deleted successfully', 'deleted' => $deletedCount]);
    }



    public function export(Request $request)
    {
        $contacts = Contact::query();

        if ($request->filled('created_at')) {
            $contacts->whereDate('created_at', $request->created_at);
        }

        if ($request->filled('created_by')) {
            $contacts->where('created_by', $request->created_by);
        }

        if ($request->filled('email')) {
            $contacts->where('email', 'like', '%' . $request->email . '%');
        }

        if ($request->filled('manager_id')) {
            $contacts->where('manager_id', $request->manager_id);
        }

        $contacts = $contacts->get();

        if ($request->get('type') === 'json') {
            return response()->json($contacts);
        }

        return Excel::download(new ContactsExport($contacts), 'contacts.xlsx');
    }
}
