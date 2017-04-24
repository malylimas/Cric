<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->increments('id');
           $table->string('identad',13)->unique();
            $table->string('nombre');
            $table->string('direccion');
            $table->date('fechaNacimiento');            
            $table->string('telefono');
            $table->integer('municipio_id')->unsigned();
            $table->integer('departamento_id')->unsigned();
            $table->string('nombreEncargado');
            $table->softDeletes();
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
        Schema::dropIfExists('alumnos');
    }
}
