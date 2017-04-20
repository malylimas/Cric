<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Egreso;
use App\Cuenta_Egreso;
use Carbon\Carbon;

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
    
    public function create (Request $request){
        $cuentas = Cuenta_Egreso::all();
        
        return view('Egreso.crear')->with('modulo',$request->modulo)->with('cuentas',$cuentas);
    }


    
    
    public function store(Request $request){
        
        $rules = [
        'Fecha' => 'required',
        'Descripcion' => 'required|max:255',
        'Cantidad' => 'required|min:0',
        'cuenta_egreso_id' => 'required',
        'modulo' =>'required',
        'beneficiario' => 'required'
        ];

        if($request->modulo == 'banco'){
            
            $rules['numero_cheque']= 'required';
        
        }

        $this->validate($request, $rules);

        

        $egreso =Egreso::create([
        'Fecha' => Carbon::createFromFormat('d/m/Y', $request->Fecha),
        'Descripcion' => $request->Descripcion,
        'Cantidad' => $request->Cantidad,
        'cuenta_egreso_id' => $request->cuenta_egreso_id,
        'modulo' => $request->modulo,
        'beneficiario' => $request->beneficiario, 
        'numero_cheque' => $request->numero_cheque
        ]);
        return $egreso;
        return redirect('egreso?modulo=' . $request->modulo);
    }
    
        public function index(Request $request){
        $egresos= Egreso::where('modulo',$request->modulo)->paginate(8);
        return view('Egreso.index')->with('egresos', $egresos)->with('modulo',$request->modulo);
    }
       
        

}
