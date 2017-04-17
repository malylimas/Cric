<?php

namespace App\Listeners;

use App\Events\CrearIngreso;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\ingreso;
use Carbon\Carbon;
class CreadorIngreso
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CrearIngreso  $event
     * @return void
     */
    public function handle(CrearIngreso $event)
    {
        //

        ingreso::create([
            'Descripcion'=>$event->descripcion,
            'Cantidad' =>$event->descripcion,
            'Fecha' => Carbon::now(),
            'cuenta_ingreso_id' =>$event->cuentaIngreso,
            ]);
    }
}
