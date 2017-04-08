<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDescuentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {       
        Schema::create('Descuento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre');
            $table->decimal('Valor');
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
         Schema::dropIfExists('Descuento');
    }
}
