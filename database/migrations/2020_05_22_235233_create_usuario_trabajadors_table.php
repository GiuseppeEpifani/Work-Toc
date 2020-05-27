<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioTrabajadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_trabajadors', function (Blueprint $table) {
            $table->id();
		    $table->string('especialidad');
		    $table->string('categoria');
            $table->unsignedBigInteger('id_usuario'); // Relación con libros
            $table->foreign('id_usuario')->references('id')->on('usuarios'); // clave foranea
            $table->string('antecedentes')->nullable();
            $table->string('activada')->nullable();
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
        Schema::dropIfExists('usuario_trabajadors');
    }
}
