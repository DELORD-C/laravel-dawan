<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('random', [IndexController::class, 'random']);

Route::get('/', [AuthController::class, 'dashboard']);
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login-handle', [AuthController::class, 'login'])->name('login.handle');
Route::get('registration', [AuthController::class, 'registration'])->name('registration');
Route::post('registration-handle', [AuthController::class, 'handleRegistration'])->name('registration.handle');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');



Route::resource('posts', PostController::class);

Route::group(['before' => 'auth'], function() {
});
