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

Auth::routes();

Route::group(['middleware' => 'auth'], function (){

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::resource('orders', 'OrderController');
Route::resource('products', 'ProductController');
Route::resource('suppliers', 'SupplierController');
Route::resource('categories', 'CategoryController');
Route::resource('status', 'StatusController');
Route::resource('settings', 'SettingController');

});
