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
        
        EgresoCuenta::create([
            'Nombre'=>$request->Nombre,
           

        ]);
        
       
        return redirect('EgresoCuenta.index');

   }



     public function index(){
        $cuenta_egreso = Cuenta_Egreso::withTrashed()->paginate(8);
        return view('EgresoCuenta.index')->with('cuenta_egreso', $cuenta_egreso);
    }


    public function modificar(cuenta_Egreso $cuentaegreso){
        return view('EgresoCuenta.modificar')->with('cuenta_egreso',$cuenta_egreso);
    }

}
