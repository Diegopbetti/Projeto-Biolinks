<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LinkController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function(){    
    Route::get('/login2', [LoginController::class, 'index'])->name('login2');
    Route::post('/login2', [LoginController::class, 'login2']);
    
    Route::get('/register2', [RegisterController::class, 'index'])->name('register2');
    Route::post('/register2', [RegisterController::class, 'register2']);
});


Route::middleware('auth')->group(function(){
    Route::get('/logout', LogoutController::class)->name('logout');
    
    Route::get('/dashboard', fn () => 'dashboard ::'. auth()->id())->name('dashboard');

    Route::get('/links/create', [LinkController::class, 'create'])->name('links.create');
    Route::post('/links/create', [LinkController::class, 'store']);
});



