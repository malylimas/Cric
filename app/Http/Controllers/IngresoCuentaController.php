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
        
            IngresoCuenta::create([
            'Nombre'=>$request->Nombre,
           

        ]);
        
       
        return redirect('IngresoCuenta.index');

   }
    
        public function index(){

        $cuenta_ingreso = Cuenta_Ingreso::withTrashed()->paginate(8);
      
        return view('Ingresocuenta.index')->with('cuenta_ingreso', $cuenta_ingreso);
    }



        public function modificar( $cuenta_ingreso){
        return view('IngresoCuenta.modificar')->with('cuenta_ingreso',$cuenta_ingreso);
     
     }

}