<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Auth::routes(['verify' => true]);
Route::post('login', 'API\UserController@login');
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('details', 'API\UserController@details');
});
Route::get('checkusers', 'TesterController@checkusers');
Route::group(['middleware' => 'auth:api'], function () {
    Route::apiResource('bukus', 'buku\bukuapps');
});
Route::resource('testers ', 'testerController');
Route::resource('cobas', 'CobaController');

Route::post('register', 'API\RegisterController@register');
Route::middleware('auth:api')->group(function () {
    Route::resource('products', 'API\ProductController');
});
