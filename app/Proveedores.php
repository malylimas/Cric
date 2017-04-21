<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedores extends Model
{
    use SoftDeletes;
    //
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
     'Nombre',  
    ];
    protected $dates = ['deleted_at'];
    
    
    protected $table ="Proveedores";
    
    
}