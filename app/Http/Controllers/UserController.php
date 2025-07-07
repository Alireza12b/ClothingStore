<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        $user = Auth::user();
        User::where('id', $user->id)->update($request->only('name', 'email', 'phone', 'address'));

        return redirect()->back()->with('success', 'اطلاعات با موفقیت به‌روزرسانی شد.');
    }
}
