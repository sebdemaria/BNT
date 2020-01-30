<?php

//buscador y listado publico
Route::post('/search', "ServiceController@buscar");
Route::get('/search', "ServiceController@listadoPublico");

// Route::get('/', 'ServiceController@search');

//Admin view, registro y edicion de servicios
Route::get('/admin', "ServiceController@listado")->middleware('isAdmin');
Route::post('/borrarServicio', "ServiceController@borrarServicio")->middleware('isAdmin');

//rutas agregado servicio
Route::get('/agregarServicio', function () {
    return view('agregarServicio');})->middleware('isAdmin');
Route::post('/agregarServicio', "ServiceController@agregarServicio")->middleware('isAdmin');

//rutas edicion/actualizacion de servicio
Route::get('/editarServicio/{id}', "ServiceController@detallar")->middleware('isAdmin');
Route::post('/editarServicio/{id}', "ServiceController@editarServicio")->middleware('isAdmin');

Auth::routes();

//Logout
Route::get('/logout', 'Auth\LoginController@logout');

// Route::get('/home', 'HomeController@index')->name('home');
