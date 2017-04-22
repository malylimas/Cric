<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cuenta_egreso;
use App\Egreso;

class EgresoCuentaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function create(Request $request){
        
        
        return view('EgresoCuenta.crear');
    }
    
    
    
    public function store(request $request){
        
        
        $this->validate($request, [
        'Nombre' => 'required|max:30|regex:/^[\pL\s\-]+$/u',
        
        
        ]);
        
        Cuenta_Egreso::create([
        'Nombre'=>$request->Nombre,
        
        
        ]);
        
        
        return redirect('egresocuentas');
        
    }
    
    
    
    public function index(){
        $cuenta_egreso = Cuenta_Egreso::withTrashed()->paginate(8);
        return view('EgresoCuenta.index')->with('cuenta_egresos', $cuenta_egreso);
    }
    
    
    public function edit(Cuenta_Egreso $egresocuenta){
        
        
        return view('EgresoCuenta.modificar')->with('cuenta_egreso',$egresocuenta);
    }

    public function update(request $request,Cuenta_Egreso $egresocuenta){
        
        
        $this->validate($request, [
        'Nombre' => 'required|max:30|regex:/^[\pL\s\-]+$/u',
        
        
        ]);
        
        $egresocuenta->Nombre = $request->Nombre;
        
        $egresocuenta->save();
        return redirect('egresocuentas');
        
    }
    
    
    
    
}