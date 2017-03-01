<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patologia extends Model
{

use SoftDeletes;
     //
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Nombre_Patologia', 'terapia_id', 
    ];

    protected $dates = ['deleted_at'];

    public function terapia(){
        return $this->belongsTo('App\Terapia');
    }




    /*   
  
   protected  $table ='Patologia';


 
 public function Tratamiento()
{
    return $this->hasMany('APP/tratamiento');
}

 */ 
     

}
