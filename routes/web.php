<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function(){    
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    
    Route::get('/register2', [RegisterController::class, 'index'])->name('register2');
    Route::post('/register2', [RegisterController::class, 'register2']);
});

Route::get('/logout', LogoutController::class)->middleware('auth')->name('logout');

Route::get('/dashboard', fn () => 'dashboard ::'. auth()->id())
->middleware('auth')->name('dashboard');


