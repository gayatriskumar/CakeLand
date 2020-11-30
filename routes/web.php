<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('banner');
});
Route::post('/', [UserController::class, 'login']);

Route::view('signup','signup');
Route::post('/signup', [UserController::class, 'signup']);

Route::get('/add-product',[ProductController::class, 'addproduct']);
Route::get('/categories',[ProductController::class, 'displaycategories']);

