<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cita;
use App\Terapista;
use App\Patologia;
use App\Expediente;

class CitaController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $citas = Cita::withTrashed()->get();
        return view('Citas.index')->with('citas', $citas);
    }


    public function crear(Request $request)
    {
       $expediente= Expediente::where('Identidad', $request->numeroIdentidad)->first();
        
        if($expediente == NULL)
        {

        }
        
        $terapistas = Terapista::All();
        $patalogias= Patologia::All();

        return view('Citas.crear')->with('expediente',$expediente)->with('terapistas',$terapistas)->with('patologias',$patalogias);
    }

    public function store(Request $request,  Expediente $expediente)
    {
        
       return $request->Fecha;
    }

}
    

     


