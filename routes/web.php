<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'HomeController@index')->name('home');
Route::get('/category/{id}', 'ProductsController@index')->name('category');
Route::get('/product/{id}', 'ProductsController@view')->name('product');
Route::get('/add/{id}', 'ProductsController@add')->name('add');
Route::get('/cart', 'CartController@index')->name('cart');
Route::get('/cart/order', 'CartController@order')->name('cart.order');



Route::group(['middleware' => \App\Http\Middleware\AdminMiddleware::class], function () {
	Route::resource('/admin/products','Admin\ProductsController');
	Route::resource('/admin/categories','Admin\CategoriesController');
	Route::resource('/admin/orders','Admin\OrdersController');
	Route::resource('/admin/settings','Admin\SettingsController');
	
});
