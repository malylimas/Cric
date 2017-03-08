<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class nivelestableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
 public function run()
    {
        DB::table('nivel')->insert([
            'Descripcion' => 'Primaria',
           
        ]);
        DB::table('nivel')->insert([
            'Descripcion' => 'Secundaria'
           
        ]);
        DB::table('nivel')->insert([
            'Descripcion' => 'Nivel_Universitario'
           
        ]);
       

    }
}
