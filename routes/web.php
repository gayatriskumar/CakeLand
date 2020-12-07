<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserAuth;


// Route::get('/', [UserController::class, 'userAccess']);
// Route::get('/home', [UserController::class, 'userAccess']);


Route::get('/', function () {
        return view('banner');
});
Route::get('/home', function () {
        return view('banner');
});


Route::post('user', [Usercontroller::class, 'login']);
Route::view('user_home', 'layout');
Route::get('/logout',[UserController::class, 'logout']);

Route::view('signup','layout-signup');
Route::post('/signup', [UserController::class, 'signup']);

Route::get('/add-product',[ProductController::class, 'addproduct']);
Route::get('/popular-cakes',[ProductController::class, 'displaypopularcakes']);
Route::get('/birthday-cakes',[ProductController::class, 'displaybirthdaycakes']);
Route::get('/anniversary-cakes',[ProductController::class, 'displayanniversarycakes']);
Route::get('/special-cakes',[ProductController::class, 'displayspecialcakes']);
Route::get('/detail/{id}',[ProductController::class, 'detail']);
Route::get('search',[ProductController::class, 'search']);

Route::post('detail/cart',[ProductController::class, 'addToCart']);
Route::get('cart',[ProductController::class, 'viewCart']);

