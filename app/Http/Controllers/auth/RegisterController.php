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

        $create             = new User();
        $create->firstname  = $request->input('firstname');
        $create->lastname   = $request->input('lastname');
        $create->username   = $request->input('username');
        $create->phone      = $request->input('phone');
        $create->email      = $request->input('email');
        $create->password   = Hash::make($request->input('password'));
        $create->save();

        return redirect()->route('register');
    }
}
