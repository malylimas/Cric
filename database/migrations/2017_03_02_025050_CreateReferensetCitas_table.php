<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferensetCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('citas', function (Blueprint $table) {
        $table->foreign('terapista_id')->references('id')->on('terapistas');
        $table->foreign('Patologia_id')->references('id')->on('Patologias');
        $table->foreign('Paciente_id')->references('id')->on('pacientes');
    });
        
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('citas');
    }
}
