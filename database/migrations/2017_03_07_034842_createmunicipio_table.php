<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatemunicipioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
         Schema::create('municipio', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre_Municipio');
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
        $table->dropForeign('municipio');
    }
}
