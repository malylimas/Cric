<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Ingreso extends Model
{
     use SoftDeletes;
     //
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id' , 'Fecha', 'Cantidad', 'Descripcion', 'cuenta_ingreso_id', 'modulo'
    ];
        
    protected $dates = ['deleted_at'];

    public function cuentaIngreso(){
        return $this->belongsTo('App\cuenta_ingreso','cuenta_ingreso_id'); 
    }

}
