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
        
        
        $this->validate($request, [
        'Nombre' => 'required|max:30|regex:/^[\pL\s\-]+$/u',
        'Telefono' => 'required |digits:8',
        'Direccion' => 'required|max:150',
        ]);
        
        Terapista::create([
        'Nombre'=>$request->Nombre,
        'Telefono' => $request->Telefono,
        'Direccion' => $request->Direccion
        ]);
        
        return redirect('terapista/index');
    }
    
    public function index(){
        $terapistas = Terapista::withTrashed()->paginate(8);
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

        $this->validate($request, [
        'Nombre' => 'required|max:30',
        'Telefono' => 'required |digits:8',
        'Direccion' => 'required|max:150',
        ]);
        
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
        
        
        if($request->tipo == 'm')
        {
            $dates = explode('/',$request->fechaMensual);
            
            $fecha =Carbon::create($dates[1], $dates[0], 1, 0, 0, 0, 0);
            
            
            $citas= cita::where('terapista_id', '=', $terapista->id)->
            whereMonth('Fecha_Hora',$fecha->month)->
            whereYear('Fecha_Hora', $fecha->year)
            ->orderby('Fecha_Hora')
            ->get();
            
        }else{
            $fecha =Carbon::parse($request->fechaDiaria);
            $citas= cita::where('terapista_id', '=', $terapista->id)->
            whereMonth('Fecha_Hora',$fecha->month)->
            whereYear('Fecha_Hora', $fecha->year)->
            whereDay('Fecha_Hora', $fecha->day)
            ->orderby('Fecha_Hora')
            ->get();
        }
        
        
        return view('terapista.disponibilidad')->with('terapista', $terapista)->with('tipo',$request->tipo)->
        with('citas',$citas)->with('tipo', $request->tipo)->with('fechaDiaria',$request->fechaDiaria)->with('fechaMensual',$request->fechaMensual) ;
    }
    
    
    
}