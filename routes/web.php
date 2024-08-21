<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('users',[UserController::class,'index'])->name('users.index');

Route::get('users/create',[UserController::class,'create'])->name('users.create');

Route::post('users',[UserController::class,'store'])->name('users.store');

Route::get('users/{user}/edit',[UserController::class,'edit'])->name('users.edit');

Route::put('users/{user}',[UserController::class,'update'])->name('users.update');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
