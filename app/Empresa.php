<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    //

    public function empleados()
        {
            return $this->hasMany('App\Empleado', 'empresa', 'id');
        }
    
}
