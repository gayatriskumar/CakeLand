<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
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
Route::get('/add_favorite/{id}',[ProductController::class, 'addToFavorites']);
Route::get('/remove_favorite/{id}',[ProductController::class, 'removeFromFavorites']);
Route::get('search',[ProductController::class, 'search']);

Route::get('/profile',[UserController::class, 'profileUser']);
Route::get('mycakes',[UserController::class, 'showmycakes']);
Route::get('/profile-edit-user',[UserController::class, 'EditProfileUser']);
Route::post('/profile-edit-user',[UserController::class, 'SaveProfileUser'])->name('user.save');

Route::get('/contact',[UserController::class, 'contactUs']);
Route::post('/contact', [UserController::class, 'contact']);

Route::post('detail/cart',[ProductController::class, 'addToCart']);


Route::get('cart',[ProductController::class, 'viewCart']);
Route::get('removecart/{id}',[ProductController::class, 'removeCart']);

Route::get('checkout',[ProductController::class, 'checkout']);
Route::post('confirmorder', [ProductController::class, 'confirmOrder']);

Route::get('/admin',[AdminController::class, 'adminHome']);
Route::get('categories-admin',[AdminController::class, 'viewCategories']);

Route::get('/popular-cakes-admin',[AdminController::class, 'displayPopularcakesAdmin']);
Route::get('/birthday-cakes-admin',[AdminController::class, 'displayBirthdaycakesAdmin']);
Route::get('/anniversary-cakes-admin',[AdminController::class, 'displayAnniversarycakesAdmin']);
Route::get('/special-cakes-admin',[AdminController::class, 'displaySpecialcakesAdmin']);

Route::get('/delete-category/1',[AdminController::class, 'deletePopularcakesAdmin']);
Route::get('/delete-category/2',[AdminController::class, 'deleteBirthdaycakesAdmin']);
Route::get('/delete-category/3',[AdminController::class, 'deleteAnniversarycakesAdmin']);
Route::get('/delete-category/4',[AdminController::class, 'deleteSpecialcakesAdmin']);


Route::get('/create_item_admin',[AdminController::class, 'viewCreateItemAdmin']);
Route::post('/create_item_admin',[AdminController::class, 'createItemAdmin'])->name('item.save');

Route::get('edit-item/{id}',[AdminController::class, 'viewEditItem']);
Route::post('/edit-item/{id}',[AdminController::class, 'updateItemAdmin'])->name('item.update');

Route::get('inbox-admin',[AdminController::class, 'viewInboxAdmin']);
Route::get('order-admin/{id}',[AdminController::class, 'orderAdmin']);
Route::get('delivery-staff/{id}',[AdminController::class, 'viewDeliveryStaffAdmin']);
Route::get('process_order',[AdminController::class, 'processOrderAdmin']);
Route::get('assign_order',[AdminController::class, 'assignOrderAdmin']);

Route::get('profile-admin',[AdminController::class, 'viewProfileAdmin']);
Route::get('/profile-edit-admin',[AdminController::class, 'EditProfileAdmin']);
Route::post('/profile-edit-admin',[AdminController::class, 'SaveProfileAdmin'])->name('admin.save');
