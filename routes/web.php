<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[FrontendController::class,'index']);
Route::get('category',[FrontendController::class,'category']);
Route::get('category/{slug}',[FrontendController::class,'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}',[FrontendController::class,'viewproduct']);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('add-to-car',[CartController::class,'addProduct']);
Route::post('delete-cart-item',[CartController::class,'deleteproducts']);
Route::post('update-cart',[CartController::class,'updatecart']);

Route::middleware(['auth'])->group(function () {
    Route::get('cart',[CartController::class,'viewcart']);
    Route::get('checkout',[CheckoutController::class,'index']);
    Route::post('place-order',[CheckoutController::class,'placeorder']);

    Route::get('my-orders',[UserController::class,'index']);
    Route::get('view-order/{id}',[UserController::class,'view']);

});


Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', 'Admin\FrontentController@index');

    Route::get('categories', 'Admin\CategoryController@index');
    Route::get('add-category','Admin\CategoryController@add');
    Route::post('insert-category','Admin\CategoryController@insert');
    Route::get('edit-category/{id}',[CategoryController::class,'edit']);
    Route::put('update-category/{id}',[CategoryController::class ,'update']);
    Route::get('delete-category/{id}',[CategoryController::class,'destroy']);

    Route::get('products',[ProductController::class,'index']);
    Route::get('add-products',[ProductController::class,'add']);
    Route::post('insert-product',[ProductController::class,'insert']);
    Route::get('edit-product/{id}',[ProductController::class,'edit']);
    Route::put('update-product/{id}',[ProductController::class ,'update']);
    Route::get('delete-product/{id}',[ProductController::class,'destroy']);

    Route::get('users',[FrontendController::class,'users']);
    Route::get('orders',[OrderController::class,'index']);
 });