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
Route::get('/', function () {
    return redirect('home');
});
Route::get('/home', 'ShopController@index')->name('shop');
Route::get('/{id}', 'ShopController@detail')->name('detail');
Route::post('/store/{id}', 'ShopController@store')->name('store');

