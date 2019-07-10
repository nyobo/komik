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
// Route::group(['middleware' => 'auth:api'], function () {
//     Route::post('details', 'API\UserController@details');
// });
// Route::get('checkusers', 'TesterController@checkusers');
// Route::group(['middleware' => 'auth:api'], function () {
//     Route::apiResource('bukus', 'buku\bukuapps');
// });

// Route::post('register', 'API\RegisterController@register');

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'API\UserController@details');
});

Route::middleware('auth:api')->group(function () {
    Route::resource('products', 'API\ProductController');
    Route::resource('komiks','API\KomikController');
	Route::resource('kategoris','API\KategoriController');
	Route::resource('komik-details','API\KomikDetailController');
});
