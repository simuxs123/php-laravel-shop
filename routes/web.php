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

Route::get('/', 'ShopController@index')->name('home');
Route::get('/kategorija/{category:name}', 'ShopController@category');
Route::get('/checkout/{product}', 'ShopController@checkout');
Route::post('/storeorder/{product}','ShopController@storeOrder');
Route::get('/product/{product}', 'ShopController@showProduct');

Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin-add', 'AdminController@addProduct');
Route::post('/store', 'AdminController@store');
Route::get('/admin-orders', 'AdminController@orders');
Route::get('/admin-update/{product}', 'AdminController@updateProduct');
Route::post('/storeupdate/{product}', 'AdminController@storeUpdate');
Route::get('/delete/{product}', 'AdminController@delete');

Route::post('/updatestatus', 'AdminController@updateStatus')->name('updateStatus');
Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
