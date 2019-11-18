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
// Route::post('login', 'API\UserController@login');
// Route::group(['middleware' => 'auth:api'], function () {
//     Route::post('details', 'API\UserController@details');
// });
// Route::get('checkusers', 'TesterController@checkusers');
// Route::group(['middleware' => 'auth:api'], function () {
//     Route::apiResource('bukus', 'buku\bukuapps');
// });

// Route::post('register', 'API\UserController@register');

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

// Route::group(['middleware' => 'auth:api'], function(){
//     Route::post('details', 'API\UserController@details');
// });

Route::middleware('auth:api')->group(function () {
    Route::post('add-view-komik', 'API\DeviceController@addViewKomik');
    Route::post('add-device', 'API\DeviceController@addDevice');
    Route::post('add-device-name', 'API\DeviceController@addDeviceName');
    Route::get('count-view-komik', 'API\DeviceController@getViewCountKomik');
    Route::post('search-komik', 'API\SearchKomikController@searchKomiks');
    
    Route::post('add-lnd-komentar','API\LikeAndDislikeController@addLnDKomentar');
    Route::delete('deleter-lnd-komentar','API\LikeAndDislikeController@deleteLnDKomentar');
    Route::get('get-lnd-komentar', 'API\LikeAndDislikeController@getLnDKomentar');
    
    Route::resource('products', 'API\ProductController');
    Route::resource('komiks','API\KomikController');
	Route::resource('kategoris','API\KategoriController');
    Route::resource('komik-details','API\KomikDetailController');
    Route::resource('jadwals','API\JadwalController');
    Route::resource('banners','API\BannerController');
    Route::resource('komentar','API\KomentarController');
    Route::resource('komentar-detail','API\KomentarDetailController');

});
// Route::fallback(function(){
//     return response()->json([
//         'message' => 'Page Not Found. If error persists, contact info@website.com'], 404);
// });
// Route::resource('komentars','APIKomentar\Controller');Route::resource('komentars','APIKomentar\Controller');