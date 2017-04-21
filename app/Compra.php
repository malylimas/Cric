<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Compra extends Model
{
     use SoftDeletes;
     //
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Id' , 'Fecha', 'Descripcion','provedore_id','NumeroFactura', 
    ];



    protected $dates = ['deleted_at'];

   
}
