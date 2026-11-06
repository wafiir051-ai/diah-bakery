<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Ambil input dari form
        $email = $request->email;
        $password = $request->password;
        
        // Coba login
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Berhasil login, langsung redirect
            return redirect('admin/dashboard');
        }
        
        // Gagal login
        return back()->with('error', 'Email atau password salah!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}