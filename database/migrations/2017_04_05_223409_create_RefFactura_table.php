<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefFacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('Facturas', function (Blueprint $table) {
        $table->foreign('paciente_id')->references('id')->on('pacientes');         
        $table->foreign('cita_id')->references('id')->on('cita');  
    });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         $table->dropForeign('Facturas');
    }
}
