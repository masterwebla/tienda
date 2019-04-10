<?php

Route::get('/', function () {
    return view('welcome');
});

//CRUDs
Route::resource('/admin/perfiles','Admin\PerfilesController');
Route::resource('/admin/estadospedidos','Admin\EstadospedidosController');
Route::resource('/admin/productos','Admin\ProductosController');
Route::get('/admin/productos-pdf','Admin\ProductosController@generarPDF')->name('productos-pdf');
Route::get('/admin/productos-excel','Admin\ProductosController@generarExcel')->name('productos-excel');
Route::get('/admin/sol-importar','Admin\ProductosController@solImportar')->name('sol-importar');
Route::post('/admin/productos-importar','Admin\ProductosController@importarExcel')->name('productos-importar');

Route::get('/admin/imagenes/{id}','Admin\ImagenesController@index')->name('imagenes');
Route::post('/admin/imagenes/','Admin\ImagenesController@store')->name('img-guardar');
Route::delete('/admin/imagenes/{id}','Admin\ImagenesController@destroy')->name('img-borrar');

Route::resource('/admin/metodos','Admin\MetodospagoController');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');