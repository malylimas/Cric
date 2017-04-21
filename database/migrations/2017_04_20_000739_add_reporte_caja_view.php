<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReporteCajaView extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        //
        DB::statement('
        CREATE
        ALGORITHM = UNDEFINED
        DEFINER = `root`@`localhost`
        SQL SECURITY DEFINER
        VIEW `ReporteCaja` AS
        SELECT fecha,
        descripcion,
        cantidad     AS Egreso,
        NULL         AS Ingreso,
        beneficiario AS Beneficiario
        FROM   egresos
        WHERE  modulo = \'caja\'
        UNION ALL
        SELECT fecha,
        descripcion,
        NULL     AS Egreso,
        cantidad AS Igreso,
        donante  AS Beneficiario
        FROM   ingresos
        WHERE  modulo = \'caja\'
        ');
    }
    
    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        //
        $sql ='DROP VIEW ReporteCaja';
        
        DB::statement($sql);
    }
}