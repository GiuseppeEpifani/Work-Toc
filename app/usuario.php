<?php

namespace App;
use App\usuario_trabajador;

use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{

    public function usuario_trabajador()
    {
        return $this->belongsTo('App\usuario_trabajador','id');
    } 

    public function scopeActivar_usuario($query)
    {
        //aca preguntamos si existe la variable email  
            return $query->where('usuario_trabajadors.activada', null);
        
    }

    public function scopeBloquear_usuario($query)
    {
        //aca preguntamos si existe la variable email  
            return $query->where('usuario_trabajadors.activada', 'si')->orwhere('usuarios.bloqueado', null);
        
    }
}
