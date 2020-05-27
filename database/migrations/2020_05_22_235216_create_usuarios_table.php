<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();	
		    $table->string('correo');
		    $table->string('nombre');
		    $table->string('ape_paterno');
		    $table->string('ape_materno');
		    $table->string('clave');
		    $table->string('foto')->unique();
            $table->integer('numero')->unique();	
            $table->string('bloqueado')->nullable();			
			
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
        Schema::dropIfExists('usuarios');
    }
}
