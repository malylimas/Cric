<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Cuenta_Egreso extends Model
{
    use SoftDeletes;
     //
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id' , 'Nombre', 
    ];

    


}
