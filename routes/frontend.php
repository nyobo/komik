<?php

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('latihan', 'HomeController@latihan');