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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/order', 'HomeController@indexOrder')->name('order');
Route::post('/order/save', 'HomeController@saveOrder')->name('order.save');
Route::get('/order/{order}', 'HomeController@show')->name('order.show');

// Admin section
Route::prefix('admin')->group(function () {
  Route::get('/orders', 'AdminOrderController@index')->name('admin.orders');
  Route::get('/orders/edit/{order}', 'AdminOrderController@edit')->name('admin.orders.edit');
  Route::patch('/orders/{order}', 'AdminOrderController@update')->name('admin.orders.update');
});

