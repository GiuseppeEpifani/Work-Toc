<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class opinion_cliente extends Model
{
    public function usuario_trabajador_opinion(){ 
        return $this->hasMany(usuario_trabajador::class); 
    }

     
    public function usuario_cliente_opinion(){ 
        return $this->hasMany(usuario::class); 
    }

}
