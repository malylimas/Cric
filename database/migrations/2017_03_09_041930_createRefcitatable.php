<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefcitatable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
              Schema::table('cita', function (Blueprint $table) {
        $table->foreign('paciente_id')->references('id')->on('pacientes');         
        $table->foreign('terapista_id')->references('id')->on('terapistas');
        $table->foreign('Patologia_id')->references('id')->on('Patologias');
        
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
