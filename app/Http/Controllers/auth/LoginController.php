<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($request->only('username', 'password'))) {
            return redirect()->route('admin')->with('success', 'Login successful!');
        } else {
            return "Login failed! Please check your credentials.";
        }
    }
}
