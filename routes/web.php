<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartController;

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
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category/{id}', [ProductsController::class, 'index'])->name('category');
Route::get('/product/{id}', [ProductsController::class, 'view'])->name('product');
Route::get('/add/{id}', [ProductsController::class, 'add'])->name('add');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/cart/order', [CartController::class, 'order'])->name('cart.order');



Route::group(['middleware' => \App\Http\Middleware\AdminMiddleware::class], function () {
	Route::resource('/admin/products','Admin\ProductsController');
	Route::resource('/admin/categories','Admin\CategoriesController');
	Route::resource('/admin/orders','Admin\OrdersController');
	Route::resource('/admin/settings','Admin\SettingsController');
	
});
