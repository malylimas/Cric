<?php

use Illuminate\Database\Seeder;

class municipiostableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('municipio')->insert([
            'Nombre_Municipio' => 'Siguatepeque',
            'departamento_id'  => '1',
           
        ]);
        DB::table('municipio')->insert([
            'Nombre_Municipio' => 'El rosario',
             'departamento_id' => '2',
           
        ]);
        DB::table('municipio')->insert([
            'Nombre_municipio' => 'Taulabe',
            'departamento_id' => '3',
        ]);
    }
}
