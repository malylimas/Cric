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
        'Nombre_Paciente' , 'Fecha', 'Hora','terapista_id', 'Patologia_id', 'expediente_id', 
    ];

    protected $dates = ['deleted_at'];

    public function terapista(){
        return $this->belongsTo('App\Terapista');
    }

    public function Patologia(){
        return $this->belongsTo('App\Patologia');
    }
    
    public function expediente(){
        return $this->belongsTo('App\Expediente');
    }
}
