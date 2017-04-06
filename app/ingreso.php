<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ingreso extends Model
{
    use SoftDeletes;
     //
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $fillable = [
        'Id' , 'Nombre', 'Fecha','Descripcion', 
    ];

    protected $dates = ['deleted_at'];



    protected $table ="ingreso";
}

