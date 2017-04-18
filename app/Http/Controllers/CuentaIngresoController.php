<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingreso;
use App\cuenta_Ingreso;

class CuentaIngresocontroller extends Controller
{
    
    
    public function create (Request $request){
        $cuentas = cuenta_Ingreso::all();
        return view('Ingreso.crear')->with('cuentas',$cuentas)->with('modulo',$request->modulo);;
    }
    
    
    public function index(Request $request){
        
        
        $ingresos= Ingreso::where('modulo',$request->modulo)->paginate(8);
        
        return view('Ingreso.index')->with('ingresos', $ingresos)->with('modulo',$request->modulo);
    }
    
    
    public function store(Request $request){
        $this->validate($request, [
        'Fecha' => 'required',
        'Descripcion' => 'required|max:255',
        'Cantidad' => 'required|min:0',
        'cuenta_ingreso_id' => 'required'
        
        ]);
        
        Ingreso::create([
        'Fecha' => $request->Fecha,
        'Descripcion' => $request->Descripcion,
        'Cantidad' => $request->Cantidad,
        'cuenta_ingreso_id' => $request->cuenta_ingreso_id,
        'modulo' => $request->modulo
        ]);
        
        
        
        return redirect('/ingreso?modulo=' . $request->modulo);
    }
    
    
}