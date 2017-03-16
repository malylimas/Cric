<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cita extends Model
{
    
    use SoftDeletes;
     //
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Nombre_Paciente' , 'Fecha_Hora', 'terapista_id', 'Patologia_id', 'paciente_id', 
    ];

    protected $dates = ['deleted_at'];

    public function terapista(){
        return $this->belongsTo('App\Terapista');
    }

    public function Patologia(){
        return $this->belongsTo(Patologia::class, 'Patologia_id');
    }
    
    public function paciente(){
        return $this->belongsTo('App\Paciente');
    }

     protected $table ="cita";
}
