<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CuentaEgreso;



class CuentaEgresocontroller extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
      public function crear (){
        return view('CuentaEgreso.crear');
    }

    public function store(Request $request){

        Cuenta_Egreso::create([
            'id'=>$request->id,
            'Nombre' => $request->Nombre,   

        ]);

        return redirect('cuentaEgreso/index');
    }

     public function index(){
        $cuentasegresos= Cuenta_Egreso::withTrashed()->paginate(8);
        return view('cuentaegreso.index')->with('cuentasegresos', $cuentaegresos);
    }

     
}


    
    

