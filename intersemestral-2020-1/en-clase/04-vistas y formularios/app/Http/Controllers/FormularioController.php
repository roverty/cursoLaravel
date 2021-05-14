<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidarFormularioRequest;

class FormularioController extends Controller
{
	public function form(){
		return view('formulario');
	}

	public function enviardatos(ValidarFormularioRequest $request){

		dd($request->all()['nombre']);
		return redirect('pendientes2');
	}

	// public function store(Request $request)
	// {
	// 	$validator = Validator::make($request->all(), [
	// 		'nombre'=>'required|min:1|max:20',
	// 		'apellidos'=>'required|min:1|max:30',
	// 		'email'=>'required|email|',
	// 		'contraseña'=>'required|min:1|max:4'
	// 	]);

	// 	if ($validator->fails()) {
	// 		return redirect('pendientes')
	// 		->withErrors($validator)
	// 		->withInput();
	// 	}
	// }
}

