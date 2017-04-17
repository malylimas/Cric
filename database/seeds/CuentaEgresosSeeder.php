<?php

use Illuminate\Database\Seeder;

class CuentaEgresosSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $cuentas =[
        "Sueldos/catorceavo/ aguinaldo",
        "Papelería y útiles de oficina",
        "Material de Aseo",
        "Reparación y/o mantenimiento  ",
        "Cuota Patronal IHSS",
        "Gastos por atención a usuarios de areas",
        "Servicios Públicos (Teléfono, agua, luz)",
        "Seguridad (vigilancia fines de semana y otros)",
        "Mantenimiento (area verde)",
        "Gastos de Administración",
        "Transporte",
        "Notas de débito del banco",
        "Compra de materiales y equipo para las areas",
        "Estipendio a estudiante de servicio social",
        "Pago de cuotas por derechos laborales",
        "Pago de Membresia a CIARH",
        "Proyecto de mejoras",
        "Gastos de Capacitaciones,reuniones, celebraciones",
        "Otros Egresos"
        ];
        $count = 1;
        
        foreach($cuentas as $cuenta){
            $this->create($count,$cuenta);
            $count =$count+1;
        }
    }
    
    public function create($id,$nombre){
        
        factory(App\Cuenta_Egreso::class)->create([
        'Nombre' => $nombre,
        'id' => $id,
        ]);
    }
}