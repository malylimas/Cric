<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Egreso;
use App\Cuenta_Egreso;


class ReporteContabilidadController extends Controller
{
    public function reportecaja(Request $request){


        return view('ReporteContabilidad.reportecaja');
    }
    

   
   public function reportecheque(request $request){
       return view('ReporteContabilidad.reportecheque');
   }

   public  function reportefinanciero(request $request){
       return view ('ReporteContabilidad.reportefinanciero');
   }
}
