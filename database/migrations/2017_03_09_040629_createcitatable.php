<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Createcitatable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cita', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('paciente_id')->unsigned();
            $table->integer('terapista_id')->unsigned();
            $table->integer('Patologia_id')->unsigned();
            $table->Datetime('Fecha_Hora');
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
      $table->dropForeign('cita');      
    }
}
