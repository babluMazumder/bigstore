<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('product-details/{id}', [App\Http\Controllers\HomeController::class, 'productDetails']);
Route::get('category-wise-product/{id}', [App\Http\Controllers\HomeController::class, 'categoryWiseProduct']);



Route::get('cart', [App\Http\Controllers\CartController::class, 'cartList']);
Route::post('add-to-cart', [App\Http\Controllers\CartController::class, 'addToCart']);
Route::get('remove/{id}', [App\Http\Controllers\CartController::class, 'removeCart']);
Route::post('update-cart', [App\Http\Controllers\CartController::class, 'updateCart']);

Route::get('checkout', [App\Http\Controllers\HomeController::class, 'checkout']);

Route::get('user-login', [App\Http\Controllers\UserController::class, 'userLogin']);
Route::post('user-login', [App\Http\Controllers\UserController::class, 'userLoginPost']);
Route::get('user-register', [App\Http\Controllers\UserController::class, 'userRegister']);
Route::post('user-register', [App\Http\Controllers\UserController::class, 'userRegisterStore']);



Route::get('stripe', [StripeController::class, 'stripe']);
Route::post('stripe', [StripeController::class, 'stripePost']);






Route::middleware(['CheckAuth'])->group(function () {

    Route::get('dashboard', function() {
        return view('backend.dashboard');
    });

    // category related routes
    Route::get('category', [App\Http\Controllers\CategoryController::class, 'index']);
    Route::get('category/add-new', [App\Http\Controllers\CategoryController::class, 'addNew']);
    Route::post('category/store', [App\Http\Controllers\CategoryController::class, 'store']);
    Route::get('category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit']);
    Route::post('category/update', [App\Http\Controllers\CategoryController::class, 'update']);
    Route::get('category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete']);


    // Sub category reloated routes
    Route::get('sub-category', [App\Http\Controllers\SubCategoryController::class, 'index']);
    Route::get('sub-category/add-new', [App\Http\Controllers\SubCategoryController::class, 'addNew']);
    Route::post('sub-category/store', [App\Http\Controllers\SubCategoryController::class, 'store']);
    Route::get('sub-category/edit/{id}', [App\Http\Controllers\SubCategoryController::class, 'edit']);
    Route::post('sub-category/update', [App\Http\Controllers\SubCategoryController::class, 'update']);
    Route::get('sub-category/delete/{id}', [App\Http\Controllers\SubCategoryController::class, 'delete']);


    // products related routes

    Route::get('product', [App\Http\Controllers\ProductController::class, 'index']);
    Route::get('product/add-new', [App\Http\Controllers\ProductController::class, 'addNew']);
    Route::post('product/store', [App\Http\Controllers\ProductController::class, 'store']);
    Route::get('product/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit']);
    Route::post('product/update', [App\Http\Controllers\ProductController::class, 'update']);
    Route::get('product/delete/{id}', [App\Http\Controllers\ProductController::class, 'delete']);

    Route::post('product/subcategory', [App\Http\Controllers\ProductController::class, 'getSubcategory']);

});
