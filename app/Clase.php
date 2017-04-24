<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    //
    protected $fillable = [
    'nombre'
    
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        
    ];
}
