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
    'Id' , 'Fecha', 'Descripcion','proveedore_id','cantidad','NumeroFactura',
    ];
    
    
    public function proveedores(){
        return $this->belongsTo('App\Proveedores','proveedore_id');
    }
    
    protected $dates = ['deleted_at'];
    
    
}