<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ProveedoresController extends Controller
{
    
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create (){
        return view('proveedores.crear');
    }
    
    public function store(Request $request){
        
        
        $this->validate($request, [
        'Nombre' => 'required|max:30|regex:/^[\pL\s\-]+$/u',
        
        ]);
        
        Proveedores::create([
        'Nombre'=>$request->Nombre,
        
        ]);
        
        return redirect('proveedroes/index');
    }
    
    
    public function index(){
        $proveedores = Proveedores::withTrashed()->paginate(8);
        
        return view('proveedores.index')->with('proveedores',$proveedores);
    }
    
    public function modificar(proveedores $proveedores){
        return view('provedores.modificar')->with('proveedores',$proveedores);
    }
    
    
}