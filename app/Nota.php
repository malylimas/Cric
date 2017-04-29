<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nota extends Model
{
     use SoftDeletes;
    //

    protected $fillable = [
    'matricula_id','clase_id','primerParcial','segundoParcial','tercerParcial','cuartoParcial'
    ];
    


     protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',        
    ];

    protected $casts = [
        'primerParcial' => 'integer',
        'segundoParcial' => 'integer',
        'tercerParcial' => 'integer',
        'cuartoParcial' => 'integer',
    ];

    public function clase(){
        return $this->belongsTo('App\Clase');
    }
    public function calcularPromedio(){

        $this->promedio = ($this->primerParcial + $this->segundoParcial + $this->tercerParcial + $this->cuartoParcial )/4  ;
    }
}
