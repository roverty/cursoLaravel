<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    public function lugar(){
        return $this->belongsTo('App\Lugar');
    }
}
