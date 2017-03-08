<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatenivelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('nivel', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Descripcion');
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
        $table->dropForeign('nivel');
    }
}
