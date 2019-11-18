<?php 

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/jadwal-harian', 'JadwalHarianController@index')->name('jadwal-harian');
Route::get('/genre', 'GenreController@index')->name('genre');
Route::get('/populare', 'PopulateController@index')->name('populare');