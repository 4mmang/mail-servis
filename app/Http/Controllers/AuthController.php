<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        $credentials = $request->only(['email', 'password']);
        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin/dashboard');
        }
        return back()->with([
            'message' => 'Email atau password Anda salah!',
        ]);
    }

    public function logout(Request $request)
    {
        // memanggil fungsi logout dari class Auth
        Auth::logout();
        // method ini juga akan memanggil 2 fungsi dibawah
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // dan mengembalikan kehalaman login
        return redirect('login');
    }
}
