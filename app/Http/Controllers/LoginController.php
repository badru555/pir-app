<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        // echo 'err';
        return back()->with('error', 'Login failed!');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        // request()->session()->invalidate(); // jika tidak menggunakan parameter Request $request

        $request->session()->regenerateToken();

        return redirect('/login')->with('error', 'You are not logged in.');
    }
}
