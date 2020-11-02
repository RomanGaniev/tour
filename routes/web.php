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
    return view('index');
})->name('index');


Route::resource('/countries',   'CountriesController');
Route::resource('/operators',   'OperatorsController');
Route::resource('/tours',       'ToursController');
Route::resource('/permits',     'PermitsController');
Route::resource('/orders',     'OrdersController');


Route::match(['get','post'], '/orders/id={id}/tour_id={tour_id}/klient={klient}/next', 'OrdersController@next')->name('orders.next');

Route::get('/orders/id={id}/tour_id={tour_id}/klient={klient}/nextedit', 'OrdersController@nextEdit')->name('orders.nextedit');

Route::post('orders/nextcreate', 'OrdersController@nextCreate')->name('orders.nextcreate');

