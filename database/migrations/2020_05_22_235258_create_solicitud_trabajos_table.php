<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudTrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_trabajos', function (Blueprint $table) {
            $table->id();
            $table->string('latitud');
            $table->string('longitud');
            $table->string('categoria');
            $table->string('descripcion');
            $table->string('hora');
            $table->string('fecha');
            $table->integer('precio');
            $table->string('direccion');

            $table->unsignedBigInteger('id_trabajador')->nullable();
            $table->foreign('id_trabajador')->references('id')->on('usuario_trabajadors'); 

            $table->unsignedBigInteger('id_cliente');
            $table->foreign('id_cliente')->references('id')->on('usuarios'); 
            $table->timestamps();
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitud_trabajos');
    }
}
