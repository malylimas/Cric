<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(nivelestableseeder::class);
         $this->call(DescuentoSeeder::class);
         $this->call(CuentaEgresosSeeder::class);
         $this->call(CuentasIngresosSeeder::class);
       
    }     
}
