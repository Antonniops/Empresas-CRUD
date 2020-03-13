<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    //

    public function empresa_pertenece()
        {
            return $this->belongsTo('App\Empresa', 'empresa', 'id');
        }
}
