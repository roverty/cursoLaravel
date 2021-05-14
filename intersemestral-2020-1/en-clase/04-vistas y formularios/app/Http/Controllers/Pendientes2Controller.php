<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pendientes2Controller extends Controller
{
    public function ver(){
    	$eventos=array(
    		// "Salir a correr", "Ir al super", "Llevar mis bolsas :)", "Pagar la luz", "Comer"
    	);

    	return view('pendientes2')->with(compact('eventos'));
    }
}
