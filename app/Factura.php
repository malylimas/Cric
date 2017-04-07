<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Factura extends Model
{
   use SoftDeletes;
     //
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Id' , 'Fecha_Hora', 'SubTotal','Total','paciente_id', 'cita_id', 
    ];

    protected $dates = ['deleted_at'];

    public function paciente(){
        return $this->belongsTo('App\Paciente'); 
    }
}
