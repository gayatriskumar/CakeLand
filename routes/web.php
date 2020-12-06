<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserAuth;

Route::get('/', function () {
        return view('layout-login');
});

Route::get('/home', function () {
        return view('layout-login');
});


Route::post('user', [Usercontroller::class, 'login']);
Route::view('user_home', 'layout-loggedin');
Route::get('/logout',[UserController::class, 'logout']);

Route::view('signup','layout-signup');
Route::post('/signup', [UserController::class, 'signup']);

Route::get('/add-product',[ProductController::class, 'addproduct']);
Route::get('/popular-cakes',[ProductController::class, 'displaypopularcakes']);
Route::get('detail/{id}',[ProductController::class, 'detail']);
Route::get('search',[ProductController::class, 'search']);

Route::post('cart',[ProductController::class, 'addToCart']);

