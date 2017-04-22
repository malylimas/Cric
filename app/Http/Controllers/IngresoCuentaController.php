<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cuenta_Ingreso;
use App\Ingreso;

class IngresoCuentaController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function create(Request $request){
        
        
        return view('IngresoCuenta.crear');
    }
    
    
    
    public function store(request $request){
        
        
        $this->validate($request, [
        'Nombre' => 'required|max:30|regex:/^[\pL\s\-]+$/u',
        
        
        ]);
        
        cuenta_Ingreso::create([
        'Nombre'=>$request->Nombre,
        
        
        ]);
        
        
        return redirect('ingresocuentas');
        
    }
    
    public function index(){
        
        $cuenta_ingreso = cuenta_Ingreso::withTrashed()->paginate(8);
        
        return view('Ingresocuenta.index')->with('cuenta_ingresos', $cuenta_ingreso);
    }
    
    
    
    public function edit(cuenta_Ingreso $ingresocuenta){
        return view('IngresoCuenta.modificar')->with('cuenta_ingreso',$ingresocuenta);
        
    }
    
    
    public function update(request $request, cuenta_Ingreso $ingresocuenta){
        
        
        $this->validate($request, [
        'Nombre' => 'required|max:255|regex:/^[\pL\s\-]+$/u',
        
        
        ]);
        
        $ingresocuenta->Nombre= $request->Nombre;
        $ingresocuenta->save();
        
        return redirect('ingresocuentas');
        
    }
    
}