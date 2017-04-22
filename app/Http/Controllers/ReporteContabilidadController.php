<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Egreso;
use App\Cuenta_Egreso;
use App\ReporteCaja;
use App\ReporteCheque;
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
        $fecha = Carbon::createFromFormat('d/m/Y',$request->fecha);
        
        $cheques = ReporteCheque::whereMonth('fecha', $fecha->month)
        ->whereYear('fecha', $fecha->year)
        ->whereDay('fecha',$fecha->day)
        ->get();
        
        // return $cheques;
        return view('ReporteContabilidad.reportecheque')->with('cheques',$cheques)->with('fecha',$request->fecha);
    }
    
    public  function reportefinanciero(request $request){
        $anio =$request->year;
        $egresos =  DB::table('egresos')
        ->join('cuenta_egresos', 'egresos.cuenta_egreso_id', '=', 'cuenta_egresos.id')
        ->select('cuenta_egresos.id as id','cuenta_egresos.Nombre as Cuenta',DB::raw('SUM(egresos.Cantidad) as Total'), DB::raw('month( egresos.Fecha) as Mes'), DB::raw('year(egresos.fecha) as Anio'))
        ->groupBy('cuenta_egresos.id','cuenta_egresos.Nombre','Mes','Anio')
        ->having('Anio', $anio)
        ->get();
        
        $resultEgreso = array();
        $totalesEngresos = array();
        
        foreach ($egresos as $egreso) {
            $key ='M' . $egreso->id;
            $resultEgreso[$key]['cuenta'] = $egreso->Cuenta;
            $resultEgreso[$key]['M' . $egreso->Mes] = $egreso->Total;


            $totalesEngresos[$egreso->Mes] = array_get($totalesEngresos,$egreso->Mes, 0) + $egreso->Total;
        }


        
         $ingresos =  DB::table('ingresos')
        ->join('cuenta_ingresos', 'ingresos.cuenta_ingreso_id', '=', 'cuenta_ingresos.id')
        ->select('cuenta_ingresos.id as id','cuenta_ingresos.Nombre as Cuenta',DB::raw('SUM(ingresos.Cantidad) as Total'), DB::raw('month( ingresos.Fecha) as Mes'), DB::raw('year(ingresos.fecha) as Anio'))
        ->groupBy('cuenta_ingresos.id','cuenta_ingresos.Nombre','Mes','Anio')
        ->having('Anio', $anio)
        ->get();

        $resultIngresos= array();
        $totalesIngresos = array();
        
        foreach ($ingresos as $egreso) {
            $key ='M' . $egreso->id;
            $resultIngresos[$key]['cuenta'] = $egreso->Cuenta;
            $resultIngresos[$key]['M' . $egreso->Mes] = $egreso->Total;


            $totalesIngresos[$egreso->Mes] = array_get($totalesIngresos,$egreso->Mes, 0) + $egreso->Total;
        }
   
        return view ('ReporteContabilidad.reportefinanciero')
        ->with('datosEgreso',$resultEgreso)
        ->with('year',$request->year)
        ->with('totalEgreso',$totalesEngresos)
        ->with('datosIngreso',$resultIngresos)
        ->with('totalIngreso',$totalesIngresos);
    }
}