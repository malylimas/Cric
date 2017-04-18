<?php

use Illuminate\Database\Seeder;

class DepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
        //

        DB::table('departamento')->insert([
        'Nombre_Departamento' => 'Comayagua',
        
        ]);
        
        DB::table('departamento')->insert([
        'Nombre_Departamento' => 'La Paz',
        
        ]);
        DB::table('departamento')->insert([
        'Nombre_Departamento' => 'Yoro',
        
        ]);
    }
}
