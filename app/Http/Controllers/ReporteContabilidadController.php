<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Egreso;
use App\Cuenta_Egreso;
use App\ReporteCaja;
use Carbon\Carbon;
class ReporteContabilidadController extends Controller
{
    public function reportecaja(Request $request){
        $fecha = Carbon::createFromFormat('d/m/Y',$request->fecha);
  
        $movimientos = ReporteCaja::whereMonth('fecha', $fecha->month)
                                ->whereYear('fecha', $fecha->year)
                                ->whereDay('fecha',$fecha->day)
                                ->get();

        return view('ReporteContabilidad.reportecaja')->with('movimientos',$movimientos)->with('fecha',$request->fecha);
    }
    

   
   public function reportecheque(request $request){
       return view('ReporteContabilidad.reportecheque');
   }

   public  function reportefinanciero(request $request){
       return view ('ReporteContabilidad.reportefinanciero');
   }
}
