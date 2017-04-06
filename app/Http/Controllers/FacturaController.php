<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;
use App\cita;
use App\terapia;
use App\Patologia;
use App\factura;



class FacturaController extends Controller
{


  public function __construct()
    {
        $this->middleware('auth');
    }
    


    public function index()
    {
        $facturas = Factura::withTrashed()->get();
        return view('Facturas.index')->with('Facturas', $facturas);
    }
    
    
    public function crear(Request $request)
    {
        $paciente= Paciente::where('Identidad', $request->numeroIdentidad)->first();
        
        if($paciente == NULL)
        {
            return "Registre el Paciente Porfavor";
        }
        
       
        $citas= Cita::All();
        $paciente= Paciente::All();
        
        
        return view('Factura.crear')->with('paciente',$paciente)->with('cita','$citas');
    }
    
    
    
    public function store(Request $request,  Paciente $paciente)
    {

        return redirect('Facturas/index');
     }


}
