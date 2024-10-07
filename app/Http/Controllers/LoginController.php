<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Ganti 'auth.login' dengan nama view yang sesuai jika perlu
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Cek kredensial
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Jika berhasil, redirect ke dashboard
            return redirect()->intended('/dashboard');
        }
    
        // Jika gagal, kembali dengan error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
