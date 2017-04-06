<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFacturaCita extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        //
        Schema::table('cita', function (Blueprint $table) {
            $table->integer('factura_id')->unsigned()->nullable();
            $table->foreign('factura_id')->references('id')->on('facturas');
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