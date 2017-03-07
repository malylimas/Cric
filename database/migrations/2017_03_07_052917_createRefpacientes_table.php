<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefpacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     
        Schema::table('pacientes', function (Blueprint $table) {
        $table->foreign('niveleducativo_id')->references('id')->on('niveleducativo');
        $table->foreign('municipio_id')->references('id')->on('municipio');
        $table->foreign('departamento_id')->references('id')->on('departamento');
    });
    

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       $table->dropForeign('pacientes'); 
    }
}
