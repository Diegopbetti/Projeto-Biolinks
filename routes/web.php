<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\ProfileController;
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
    
    Route::get('/dashboard2', DashboardController::class)->name('dashboard2');

    Route::get('/links/create', [LinkController::class, 'create'])->name('links.create');
    Route::post('/links/create', [LinkController::class, 'store']);

    Route::middleware('can:atualizar, link')->group(function() {
        Route::get('/links/{link}/edit', [LinkController::class, 'edit'])->name('links.edit');
        Route::put('/links/{link}/edit', [LinkController::class, 'update']);
        Route::delete('/links/{link}', [LinkController::class, 'destroy'])->name('links.destroy');
    
        Route::patch('/links/{link}/up', [LinkController::class, 'up'])->name('links.up');
        Route::patch('/links/{link}/down', [LinkController::class, 'down'])->name('links.down');
    });

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update']);
});



