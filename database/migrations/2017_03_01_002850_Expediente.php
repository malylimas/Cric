<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Expediente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
         Schema::create('expedientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre_Paciente');
            $table->string('Direccion');
            $table->string('Observacion');
            $table->string('Identidad');
            $table->string('Telefono');
            $table->string('sexo');
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
        //
    }
}
