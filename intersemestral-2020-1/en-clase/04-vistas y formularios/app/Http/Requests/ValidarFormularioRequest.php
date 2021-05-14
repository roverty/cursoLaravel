<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarFormularioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre'=>'required|min:1|max:20',
            'apellidos'=>'required|min:1|max:30',
            'email'=>'required|email|',
            'contraseña'=>'required|min:1|max:4',
            'termino'=>'required'
        ];
    }

    public function messages(){
        return [
            'nombre.required'=>'Nombre necesario',
            'apellidos.required'=>'apellidos necesario',
            'email.required'=>'email necesario',
            'contraseña.required'=>'contraseña necesaria',
            'termino.required'=>'Necesario aceptar terminos'
        ];
    }
     public function attributes()
    {
        return [
            //
        ];
    }

}
