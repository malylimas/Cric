<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedores;

class ProveedoresController extends Controller
{
    
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create (){
        return view('Proveedores.crear');
    }
    
    public function store(Request $request){
        
        
        $this->validate($request, [
        'Nombre' => 'required|max:30|regex:/^[\pL\s\-]+$/u',
        
        ]);
        
        Proveedores::create([
        'Nombre'=>$request->Nombre,
        
        ]);
        
        return redirect('proveedores');
    }
    
    
    public function index(){
        $proveedores = Proveedores::withTrashed()->paginate(8);
        
        return view('Proveedores.index')->with('proveedores',$proveedores);
    }
    
    public function edit(Proveedores $proveedore){
        return view('Proveedores.modificar')->with('proveedor',$proveedore);
    }
    
    public function update(Request $request, Proveedores $proveedore){
       
        $proveedore->Nombre = $request->Nombre;
        $proveedore->save();
        return redirect('proveedores');
    }
}