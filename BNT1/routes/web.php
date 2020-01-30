<?php

//buscador
Route::get('/', function () {
    return view('search');
});

// Route::get('/', 'ServiceController@search');

//Admin view, registro y edicion de servicios
Route::get('/admin', "ServiceController@listado")->middleware('isAdmin');
Route::post('/borrarServicio', "ServiceController@borrarServicio")->middleware('isAdmin');

Route::get('/agregarServicio', function () {
    return view('agregarServicio');})->middleware('isAdmin');
Route::post('/agregarServicio', "ServiceController@agregarServicio")->middleware('isAdmin');

Route::get('/editarServicio/{id}', "ServiceController@detallar")->middleware('isAdmin');
Route::post('/editarServicio/{id}', "ServiceController@editarServicio")->middleware('isAdmin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
