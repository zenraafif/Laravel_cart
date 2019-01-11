<?php

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
Route::get('/test2', function () {
    return view('test2');
});

Route::get('/cart', 'CartController@cart');
Route::get('/form', 'CartController@form');
Route::get('/index', 'CartController@home');
Route::get('/pembelian', 'CartController@pembelian');

