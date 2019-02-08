<?php

Route::get('/', function () {
    return view('welcome');
});

//CRUDs
Route::resource('/admin/perfiles','Admin\PerfilesController');
Route::resource('/admin/productos','Admin\ProductosController');
Route::get('/admin/imagenes/{id}','Admin\ImagenesController@index')->name('imagenes');
Route::post('/admin/imagenes/','Admin\ImagenesController@store')->name('img-guardar');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');