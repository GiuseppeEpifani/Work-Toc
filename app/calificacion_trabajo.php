<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class calificacion_trabajo extends Model
{
    public function usuario_trabajador_calificacion(){ 
        return $this->hasMany(usuario_trabajador::class); 
    }
}
