<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('banner');
});
Route::post('/', [UserController::class, 'login']);

Route::view('signup','signup');
Route::post('/signup', [UserController::class, 'signup']);
