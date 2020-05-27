<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuario_trabajador extends Model
{
    public function solicitud()
    {
        return $this->hasMany('App\solicitud_trabajo');
    }

    public function usuario_trabajador()
    {
        return $this->belongsTo(usuario::class);
    }
}
