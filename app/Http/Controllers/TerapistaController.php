<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Terapista;

use App\cita;
use Carbon\Carbon;
class TerapistaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function crear (){
        return view('terapista.crear');
    }
    
    public function store(Request $request){
        
        Terapista::create([
        'Nombre'=>$request->Nombre,
        'Telefono' => $request->Telefono,
        'Direccion' => $request->Direccion
        ]);
        
        return redirect('terapista/index');
    }
    
    public function index(){
        $terapistas = Terapista::withTrashed()->get();
        $now = Carbon::today();
        return view('terapista.index')->with('terapistas', $terapistas)->with('now',$now);
    }
    
    public function modificar(Terapista $terapista){
        return view('terapista.modificar')->with('terapista',$terapista);
    }
    
    public function delete(Terapista $terapista){
        $terapista->delete();
        return redirect('terapista/index');
    }
    
    public function eliminar(Terapista $terapista){
        
        return view('terapista.eliminar')->with('terapista', $terapista);
    }
    
    public function put(Request  $request, Terapista $terapista){
        
        $terapista->Nombre= $request->Nombre;
        $terapista->Telefono=$request->Telefono;
        $terapista->Direccion=$request->Direccion;
        
        $terapista->save();
        return redirect('terapista/index');
    }
    public function habilitar ($id){
        $terapista = Terapista::withTrashed()->find($id);
        return view ('terapista.habilitar')->with('terapista', $terapista);
        
    }
    
    public function success($id) {
        $terapista = Terapista::withTrashed()->find($id);
        $terapista->restore();
        return redirect('terapista/index');
    }
    
    
    public function disponibilidad(Request $request, Terapista $terapista){
        $citas=[];
        $fecha =Carbon::parse($request->fecha);
        if($request->tipo == 'm')
        {
            $citas= cita::where('terapista_id', '=', $terapista->id)->
            whereMonth('Fecha_Hora',$fecha->month)->
            whereYear('Fecha_Hora', $fecha->year)
            ->orderby('Fecha_Hora')
            ->get();
            
        }else{
            
            $citas= cita::where('terapista_id', '=', $terapista->id)->
            whereMonth('Fecha_Hora',$fecha->month)->
            whereYear('Fecha_Hora', $fecha->year)->
            whereDay('Fecha_Hora', $fecha->day)
            ->orderby('Fecha_Hora')
            ->get();
        }
        
        
        return view('terapista.disponibilidad')->with('terapista', $terapista)->with('citas',$citas)->with('fecha',$fecha)->with('tipo', $request->tipo);
    }

      
   
}