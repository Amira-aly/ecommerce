<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// route category
Route::resource('category','CategoryController');
//route country
Route::resource('country','CountryController');
//route product
Route::resource('product','ProdectController');
//cart
Route::resource('cart','CartController');
Route::get('show_cart', 'CartController@showCart')->name('show_cart');
Route::post('/add_cart/{id}', 'CartController@addToCart')->name('add_cart');
