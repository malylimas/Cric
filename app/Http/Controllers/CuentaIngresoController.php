<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingreso;

class CuentaIngresocontroller extends Controller
{
   
    
    public function crear (){
        return view('CuentaIngreso.crear');
    }

   
     public function index(Request $request){


        $ingresos= Ingreso::where('modulo',$request->modulo)->paginate(8);
        
        return view('Ingreso.index')->with('ingresos', $ingresos);
    }
}







