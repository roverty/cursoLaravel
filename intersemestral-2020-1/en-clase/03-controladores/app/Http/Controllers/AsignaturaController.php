<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    public function ver($id)
    {
    	$clave = $this->calcularClave($id);
    	echo "Los datos de la asignatura con clave ".$clave." son";
    }
    public function eliminar($id)
    {
    	echo "La asignatura con id ".$id." ha sido eliminada";
    }
    function calcularClave($id)
    {
    	return "ALG-".$id;
    }
}
