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

Route::get('/asignatura/ver/{id}','AsignaturaController@ver')->name('asignatura.ver');
Route::get('/asignatura/eliminar/{id}','AsignaturaController@eliminar')->name('asignatura.eliminar')->middleware('auth');


Route::resource('profesor','ProfesorController');
/*
Route::get('/profesor/show/{id}','ProfesorController@show');
Route::get('/profesor/show/','ProfesorController@index');
Route::post('/profesor/edit/{id}','ProfesorController@edit');
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
