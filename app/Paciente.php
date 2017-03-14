<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Model
{
    use SoftDeletes;
     //
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'Identidad','Nombre_Paciente', 'Direccion_Actual', 'Fecha_Nacimiento','Edad','Telefono','Ocupacion','nivel','municipio','departamento','nivel_id','municipio_id','departamento_id',
    ];

    protected $dates = ['deleted_at'];

    public function nivel()
    {
        return $this->belongsTo('App\nivel');
    }
    public function municipio()
    {
        return $this->belongsTo('App\municipio');
    }
    public function departamento()
    {
        return $this->belongsTo('App\departamento');
    }
    
}
