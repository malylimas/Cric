<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre_Patologia');
            $table->string('Fecha');
            $table->string('Hora');
            $table->integer('terapista_id')->unsigned();
            $table->integer('Patologia_id')->unsigned();
            $table->integer('Paciente_id')->unsigned();
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
        Schema::dropIfExists('citas');
    }

}