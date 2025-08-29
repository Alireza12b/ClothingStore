<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();

        // جستجو روی نام یا ایمیل یا موضوع
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%")
                    ->orWhere('subject', 'like', "%$search%");
            });
        }

        $contacts = $query->orderByDesc('created_at')->paginate(10);

        return view('admin.contacts', compact('contacts'));
    }
}
