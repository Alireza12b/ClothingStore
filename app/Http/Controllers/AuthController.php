<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer'
        ]);

        return redirect()->route('login')->with('success', 'ثبت‌ نام با موفقیت انجام شد. وارد شوید.');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt($request->only('email', 'password'), $remember)) {
            return redirect('/')->with('success', 'ورود با موفقیت انجام شد.');
        }

        return back()->withErrors([
            'email' => 'اطلاعات نادرست است.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'با موفقیت خارج شدید.');
    }
}
