<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuario_trabajador;
use App\usuario;
class TrabajosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function inicio()
    {
    
        $trabajos = usuario_trabajador::join('usuarios', 'usuario_trabajadors.id', '=', 'usuarios.id') ->join('solicitud_trabajos', 'solicitud_trabajos.id_trabajador', '=', 'usuario_trabajadors.id')
            ->select('usuarios.correo','solicitud_trabajos.id',  'solicitud_trabajos.id_cliente', 'usuarios.nombre', 'usuarios.ape_paterno', 'usuarios.ape_materno', 'solicitud_trabajos.categoria', 'solicitud_trabajos.direccion', 'solicitud_trabajos.precio')->get();
           
            
        return view('usuarios_trabajador.listado_trabajos', compact('trabajos'));
    }


    
    public function mostrar_pdf()
    {
        $pdf = PDF::loadView('reporte_trabajos');

       return $pdf->stream();  
    }


    public function edit($id)
    {
        $usuarioTrabajador = usuario_trabajador::find($id);
        $valor=$usuarioTrabajador->activada;
        if($valor=="no"){     
        $usuarioTrabajador->activada = 'si';
        $valor=$usuarioTrabajador->activada;
        $usuarioTrabajador->save();
       
        return redirect('/Todos_los_usuarios')->with('mensaje_edit', 'El usuario ha sido Habilitado para trabajar.');
        }else{
            $usuarioTrabajador->activada = 'si';
            $valor=$usuarioTrabajador->activada;
            $usuarioTrabajador->save();
            return redirect('/usuario')->with('mensaje_edit', 'El usuario ha sido Habilitado para trabajar.');

        }
    }

    public function delete($id){

        $usuarioTrabajadorEliminar = usuario_trabajador::findOrFail($id);
        $usuarioTrabajadorEliminar->delete();
    
        return back()->with('mensaje_delete', 'Solicitud Eliminada.');
    }

    public function desactivar_usuario($id)
    {
        $usuarioTrabajador = usuario_trabajador::find($id);
        $usuarioTrabajador->activada = 'no';
        $usuarioTrabajador->save();
        return redirect('/Todos_los_usuarios')->with('mensaje_edit', 'El usuario trabajador ha sido Desactivado.');
    }

 

    public function solicitar_cuenta_trabajo($id)
    {           
        $usuario = usuario::find($id);

        return view('solicitar_cuenta_trabajo.form_cuenta_trabajo', compact('usuario'));
    }


}
