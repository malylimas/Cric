<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class departamento extends Model
{
    use SoftDeletes;
     //
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       ' Nombre_Departamento',
    ];

    protected $dates = ['deleted_at'];

    public function municipio()
    {
        return $this->HasMany('App\municipio');
    }


}
