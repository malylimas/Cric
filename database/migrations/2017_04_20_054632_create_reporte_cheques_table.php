<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReporteChequesTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        DB::statement('
        CREATE
        ALGORITHM = UNDEFINED
        DEFINER = `root`@`localhost`
        SQL SECURITY DEFINER
        VIEW `ReporteCheque` AS
        SELECT fecha,
        numero_cheque,
        descripcion,
        NULL         AS deposito,
        cantidad     AS retiro,
        beneficiario AS beneficiario
        FROM   egresos
        WHERE  modulo = \'banco\'
        UNION ALL
        SELECT fecha,
        NULL     AS numero_cheque,
        descripcion,
        cantidad AS deposito,
        NULL     AS retiro,
        donante  AS beneficiario
        FROM   ingresos
        WHERE  modulo = \'banco\'
        ');
    }
    
    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('ReporteCheque');
    }
}