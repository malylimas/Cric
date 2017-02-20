<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terapista extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Nombre', 'Telefono', 'Direccion',
    ];
}
