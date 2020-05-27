<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpinionClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opinion_clientes', function (Blueprint $table) {
            $table->id();
            $table->string('comentario');
            $table->string('fecha');
            $table->unsignedBigInteger('id_trabajador');
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
        Schema::dropIfExists('opinion_clientes');
    }
}
