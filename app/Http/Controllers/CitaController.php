<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cita;
use App\Terapista;
use App\Patologia;
use App\Paciente;

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
       $paciente= Paciente::where('Identidad', $request->numeroIdentidad)->first();
        
        if($paciente == NULL)
        {
                return "Registre el Paciente Porfavor";
        }
        
        $terapistas = Terapista::All();
        $patalogias= Patologia::All();

        return view('Citas.crear')->with('paciente',$paciente)->with('terapistas',$terapistas)->with('patologias',$patalogias);
    }



    public function store(Request $request,  Paciente $paciente)
    {
    
       cita::create([
            'paciente_id' =>$paciente->id,
            'terapista_id'=>$request->terapista_id,
            'Patologia_id'=>$request->Patologia_id,
            'Fecha_Hora'=>$request->Fecha_Hora,

        ]);

        

            return redirect('cita/index');
    }      

    public function modificar(Cita $cita){

    
        $terapistas = Terapista::All();
        $patalogias= Patologia::All();
        return view('Citas.modificar')->with('terapistas',$terapistas)->with('patologias',$patalogias)->with('cita',$cita);
    }
    
   

       public function delete(Cita $cita){
        $cita->delete();
        return redirect('cita/index');
    }

       public function eliminar(Cita $cita){
        
        return view('Citas.eliminar')->with('cita', $cita);
    }


      public function put(Request  $request, Cita $cita){
        
        $cita->terapista_id= $request->terapista_id;
        $cita->Patologia_id= $request->Patologia_id;
        $cita->Fecha_Hora= $request->Fecha_Hora;
        $cita->save();
       
       
        return redirect('cita/index');
        
    }
    public function habilitar ($id){
         $cita = Cita::withTrashed()->find($id);
         return view ('Citas.habilitar')->with('cita', $cita);

     }

     public function success($id) {
        $cita = Cita::withTrashed()->find($id);
        $cita->restore();
        return redirect('cita/index');
     }  

     
    public function imprimir(Cita $cita){

        
        return view('Citas.imprimir')->with('cita', $cita);
    }

    public function reporteIngresos(){
        return view('Citas.reporteingreso');
    }
     
}

    

     


