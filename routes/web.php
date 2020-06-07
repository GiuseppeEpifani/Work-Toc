<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::resource('/usuario', 'UsuarioController')->middleware(['auth', 'password.confirm']);

Route::get('/Todos_los_usuarios', 'UsuarioController@listar_toods_los_usuarios')->name('todos_los_usuarios')->middleware(['auth', 'password.confirm']);

Route::get('/desactivar/{id}', 'TrabajosController@desactivar_usuario');


Route::get('/trabajos', 'TrabajosController@inicio')->name('usuarios_trabajador.listado_trabajos')->middleware(['auth', 'password.confirm']);

Route::get('/edit/{id}', 'TrabajosController@edit')->name('usuarios_trabajador.edit');

Route::get('/bloquear/{id}', 'UsuarioController@bloquear_usuario');

Route::get('/desbloquear/{id}', 'UsuarioController@desbloquear_usuario');

Route::delete('/delete/{id}', 'TrabajosController@delete')->name('usuarios_trabajador.delete');


Route::get('pdf', 'TrabajosController@mostrar_pdf')->name('exportar_pdf')->middleware(['auth', 'password.confirm']);;


Route::get('/solicitar_cuenta/{id}', 'TrabajosController@solicitar_cuenta_trabajo');

Route::post('/enviar_cuenta_trabajador', 'TrabajosController@enviar_solicitud_cuenta_trabajo')->name('enviar_solicitud_trabajo');
