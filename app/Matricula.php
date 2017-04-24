<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    //
    protected $fillable = [
    'fecha','ano','direccion','grado_id','alumno_id',
    ];

    public function grado(){
        return $this->belongsTo('App\Grado');
    }
    public function alumno(){
        return $this->belongsTo('App\Alumno');
    }
     
      protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'fecha'
    ];
}
