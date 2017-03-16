<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\cita;

class Terapista extends Model
{
    use SoftDeletes;
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Nombre', 'Telefono', 'Direccion',
    ];

    protected $dates = ['deleted_at'];

    public function citas(){
        return $this->hasMany(cita::class);
    }
}
