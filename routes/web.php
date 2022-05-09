<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);

Route::get('/random', [IndexController::class, 'random']);

Route::get('/bonjour', function () {
    return 'Hello World';
});
