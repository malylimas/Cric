<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class municipio extends Model
{
    use SoftDeletes;
     //
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Nombre_Municipio','Descripcion','departamento_id'
    ];

    protected $dates = ['deleted_at'];

    public function departamento()
    {
        return $this->belongsTo('App\departamento');
    }




}
