<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Paciente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
         Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Identidad',13)->unique();
            $table->string('Nombre_Paciente');
            $table->string('Direccion_Actual');
            $table->string('Fecha_Nacimineto');
            $table->string('Edad');
            $table->string('Telefono');
            $table->string('Ocupacion');
            $table->integer('niveleducativo_id')->unsigned();
            $table->integer('municipio_id')->unsigned();
            $table->integer('departamento_id')->unsigned();
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
         Schema::dropIfExists('pacientes');
    }
}
