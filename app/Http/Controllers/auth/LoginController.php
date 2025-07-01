<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Check if it's AJAX
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Login successful!']);
            }

            return redirect()->route('admin')->with('success', 'Login successful!');
        }

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Invalid credentials.'], 401);
        }

        return redirect()->back()
            ->withErrors(['login' => 'Invalid credentials'])
            ->withInput();
    }
}
