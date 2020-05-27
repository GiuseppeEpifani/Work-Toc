<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class solicitud_trabajo extends Model
{
    public function usuario_trabajador_solicitud()
    {
        return $this->belongsTo('App\usuario_trabajador', 'id_trabajador');
    }

    // es necesario poner la fk con el mismo nombre que la tenemos en la tabla solicitud_trabajo, para que busque especificamente.
    public function usuario_cliente()
    {
        return $this->belongsTo('App\usuario', 'id_cliente');
    }
}
