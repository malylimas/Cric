<?php

use Illuminate\Database\Seeder;

class CuentasIngresosSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        //
        $cuentas = [
        "Colaboracion  de Usuarios area de terapia",
        "Donaciones Mensuales- Eventuales",
        "Venta y alquiler de equipo movilidad e inmovilidad",
        "Subsidio del Gobierno Central",
        "Otros Ingresos (actividades de recaudacion F.)"
        ];
        $count = 1;
        
        foreach($cuentas as $cuenta){
            $this->create($count,$cuenta);
            $count =$count+1;
        }
    }
    
    public function create($id,$nombre){
        
        factory(App\cuenta_Ingreso::class)->create([
        'Nombre' => $nombre,
        'id' => $id,
        ]);
    }
}