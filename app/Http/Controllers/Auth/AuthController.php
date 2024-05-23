<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function login_process(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->route('home');
        }

        return redirect()->back()->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }
}
