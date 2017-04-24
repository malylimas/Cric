<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    //
    protected $fillable = [
    'nombre','identidad','direccion','fechaNacimiento','telefono','municipio_id','departamento_id','nombreEncargado'    
    ];

    public function departamento(){
        return $this->belongsTo('App\Departamento');
    }
    public function municipio(){
        return $this->belongsTo('App\Municipio');
    }
     
      protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'fechaNacimiento'
    ];

   
}
