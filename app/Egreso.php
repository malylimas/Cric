<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Egreso extends Model
{
     use SoftDeletes;
     //
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id' , 'Fecha', 'Cantidad', 'Descripcion', 'cuenta_egreso_id'
    ];
        
    protected $dates = ['deleted_at'];

    public function cuenta_egreso(){
        return $this->belongsTo('App\Cuenta_Egreso'); 
    }

}
