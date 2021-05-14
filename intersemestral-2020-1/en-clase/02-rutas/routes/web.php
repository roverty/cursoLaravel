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

// Regresamos texto
Route::get('saludar', function(){
	return "Hola mundo";
});

//Regresamos variables
Route::get('prueba', function(){
	$var=3;
	return $var;
});

//Regresamos concatenaciones
Route::get('vista', function(){
	$name="Anallely";
	return "Mi nombre es".$name;
});

//Regresamos vistas junto con datos
Route::get('vista2',function(){
	return view('welcome')->with('name','Anallely');
});

// Pasamos como parametros ('ruta','vista')
Route::view('prueba2','prueba');

// Pasamos ('ruta', 'vista','variable'=>'valor');
Route::view('prueba3', 'prueba',['nombre'=>'Anallely']);

// Rutas con parametros
Route::get('/user/{i}', function($id){
	return "Eres el usuario ".$id;
});

//Rutas con varios parametros
Route::get('producto/{id}/categoria/{id2}', function($prodId, $catId){
 	return "El producto ".$prodId."tiene la categoria ".$catId;
});

//Rutas con parametro opcional
//Se pone el signo de pregunta '?' y se asigna un valor por defecto en caso de que el usuario no ponga el id 
Route::get('producto/{id?}', function($id=null){
	return "Soy el id ".$id;
});

Route::get('producto2/{id?}', function($id="Jugo"){
	return "Soy el producto".$id;
});

//Grupo de rutas 
Route::group(['prefix'=>'posts', 'as'=>'posts.'], function(){
	Route::get('prueba4', function(){
		return view('prueba')->with('nombre','Anallely');;
	});
	Route::get('prueba6', function(){
		return view('prueba')->with('nombre','Anallely');
	});
}); 