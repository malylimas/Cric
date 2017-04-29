<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('matricula_id')->unsigned();
            $table->integer('clase_id')->unsigned();
            $table->integer('primerParcial')->nullable();
            $table->integer('segundoParcial')->nullable();
            $table->integer('tercerParcial')->nullable();
            $table->integer('cuartoParcial')->nullable();
            $table->integer('promedio')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas');
    }
}
