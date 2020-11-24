<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('banner');
});

Route::get('/login', function () {
    return view('login');
});


Route::post('/login', [UserController::class, 'login']);
