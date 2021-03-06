<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CrearIngreso
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    
    public $descripcion;
    public $cuentaIngreso;
    public $cantidad;
    public $modulo;
    public $donante;
    /**
    * Create a new event instance.
    *
    * @return void
    */
    public function __construct($descripcion,$cantidad,$cuentaIngreso,$modulo,$donante)
    {
        //
        $this->descripcion = $descripcion;
        $this->cantidad = $cantidad;
        $this->cuentaIngreso = $cuentaIngreso;
        $this->modulo = $modulo;
        $this->donante = $donante;
    }
    
    /**
    * Get the channels the event should broadcast on.
    *
    * @return Channel|array
    */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}