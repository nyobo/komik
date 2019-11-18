<?php

Auth::routes();

Route::get('/', 'BackendController@index');
Route::get('/jadwal-harian', 'JadwalHarianController@index')->name('jadwal-harian');
Route::get('/genre', 'GenreController@index')->name('genre');
Route::get('/populare', 'PopulateController@index')->name('populare');