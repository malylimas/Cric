<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class egreso extends Model
{
     use SoftDeletes;
     //
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $fillable = [
        'Id' , 'Numero_Cheque', 'Fecha','Cantidad','Descripcion', 'Beneficiario',
    ];

    protected $dates = ['deleted_at'];






    protected $table ="egreso";
}

