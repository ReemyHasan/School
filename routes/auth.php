<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/user/{user}/change_password', [AuthController::class,'edit_password'])->name('user.edit_password');
Route::put('/user/{user}/change_password', [AuthController::class,'change_password'])->name('user.update_password');
