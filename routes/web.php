<?php

use Illuminate\Support\Facades\Route;
use App\Mail\UserWelcomeMail;

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
Route::get('/email', function () {
    return new UserWelcomeMail();
});
Auth::routes();
Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/order', 'OrdersController@index')->name('order.index');
    Route::post('/order', 'OrdersController@store')->name('order.store');
    Route::get('/order/create', 'OrdersController@create')->name('order.create');


    //laundry owner route
    Route::get('/laundry', 'LaundryController@index')->name('laundry.index');
    // All route your need authenticated
});


