<?php

Route::get('/', function () {
    return view('welcome');
});

//CRUD
Route::resource('/admin/perfiles','Admin\PerfilesController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');