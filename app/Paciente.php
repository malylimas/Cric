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
        'Nombre_Paciente', 'Direccion_Actual', 'Fecha_Nacimiento','Edad','Telefono','Ocupacion','niveleducativo_id','municipio_id','departamento_id',
    ];

    protected $dates = ['deleted_at'];

    public function niveleducativo()
    {
        return $this->belongsTo('App\niveleducativo');
    }
    

    
}
