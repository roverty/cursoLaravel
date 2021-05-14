<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('inicio', function(){
	return view('inicio');
})->name('inicio');

Route::get('pendientes',function(){
	return view('pendientes')->with('name', 'Anallely');
})->name('pendientes');

Route::get('contacto', 'ContactoController@mostrar')->name('contacto');

Route::get('pendientes2', 'Pendientes2Controller@ver')->name('pendientes2');

Route::get('formulario', 'FormularioController@form')->name('formulario');

Route::post('enviardatos','FormularioController@enviardatos')->name('enviardatos');

