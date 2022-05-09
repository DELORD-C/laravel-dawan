<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('random', [IndexController::class, 'random']);

Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('login-handle', [AuthController::class, 'login'])->name('login.handle');
Route::get('registration', [AuthController::class, 'registration'])->name('registration');
Route::get('registration-handle', [AuthController::class, 'handleRegistration'])->name('registration.handle');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
