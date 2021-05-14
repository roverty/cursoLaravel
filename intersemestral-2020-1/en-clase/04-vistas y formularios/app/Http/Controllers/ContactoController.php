<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function mostrar(){
    	$contactos=[
    		['nombre'=>"Lidia", 'apellido'=>"Cruz", 'tel'=>"58451256", 'sexo'=>"mujer"], 
    		['nombre'=>"Samuel", 'apellido'=>"Martinez", 'tel'=>"58451256", 'sexo'=>"hombre"],
    		['nombre'=>"Manuel", 'apellido'=>"Martinez", 'tel'=>"58451256", 'sexo'=>"hombre"],
    		['nombre'=>"Susana", 'apellido'=>"Martinez", 'tel'=>"58451256", 'sexo'=>"mujer"]
    	];

    	return view('contacto')->with('contactos',$contactos);
    }
}
