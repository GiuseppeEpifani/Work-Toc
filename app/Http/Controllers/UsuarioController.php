<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuario;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $usuarios=usuario::join('usuario_trabajadors', 'usuarios.id', '=', 'usuario_trabajadors.id_usuario')
        ->select('usuario_trabajadors.id','usuarios.correo',  'usuarios.nombre', 'usuarios.ape_paterno', 'usuarios.ape_materno','usuario_trabajadors.antecedentes')->activar_usuario()->paginate(5);

    return view('usuarios_cliente.listar_usuarios_cliente', compact('usuarios'));
    }



    
    public function listar_toods_los_usuarios()
    {
        $usuarios=usuario::all();

    return view('usuarios_cliente.listar_todos_los_usuarios', compact('usuarios'));
    }

    public function bloquear_usuario($id)
    {
        $usuarioTrabajador = usuario::find($id);
        $usuarioTrabajador->bloqueado = 'si';
        $usuarioTrabajador->save();
        return redirect('/Todos_los_usuarios')->with('mensaje_bloquear', 'El usuario ha sido Bloqueado.');
    }

    public function desbloquear_usuario($id)
    {
        $usuarioTrabajador = usuario::find($id);
        $usuarioTrabajador->bloqueado = 'no';
        $usuarioTrabajador->save();
        return redirect('/Todos_los_usuarios')->with('mensaje_bloquear', 'El usuario ha sido Desbloqueado.');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
