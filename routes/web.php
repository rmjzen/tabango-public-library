<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

// authentication routes
Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'create'])->name('register.post');
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

//admin routes
Route::get('admin/dashboard', [AdminController::class, 'show'])->name('admin');
