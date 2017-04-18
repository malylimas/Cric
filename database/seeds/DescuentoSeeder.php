<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DescuentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        factory(App\Descuento::class)->create([
        'Nombre' => 'Ninguno',
        'Valor' => 0,
        ]);
        factory(App\Descuento::class)->create([
        'Nombre' => 'Tercera Edad',
        'Valor' => 25,
        ]);
        factory(App\Descuento::class)->create([
        'Nombre' => 'Bajo Recursos',
        'Valor' => 100,
        ]);
        factory(App\Descuento::class)->create([
        'Nombre' => 'Discapacidad',
        'Valor' => 25,
        ]);
    }
}
