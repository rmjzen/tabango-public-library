<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function show(Request $request)
    {
        return view('auth.register');
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname'  => 'required|string|max:255',
            'username'  => 'required|string|max:255|unique:users,username',
            'email'     => 'required|email|max:255|unique:users,email',
            'phone'     => 'required|regex:/^09\d{9}$/|size:11',
            'password'  => 'required|string|min:6',
        ]);

        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(['success' => true, 'message' => 'Registration successful!']);
    }
}
