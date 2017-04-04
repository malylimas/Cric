<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cita;
use App\Terapista;
use App\Patologia;
use App\Paciente;
use Validator;
use App\terapia;
use Illuminate\Validation\Rule;
use Illuminate\Support\MessageBag;

class CitaController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $citas = Cita::withTrashed()->paginate(8);
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
        $terapias=Terapia::All();
        $patalogias= Patologia::All();
        
        
        return view('Citas.crear')->with('paciente',$paciente)->with('terapistas',$terapistas)->with('terapias',$terapias)->with('patologias',$patalogias);
    }
    
    
    
    public function store(Request $request,  Paciente $paciente)
    {
        
        $this->Validate($request,
        ['Fecha_Hora' => ['required'],
        'terapista_id' => ['required']]);
        
        
        
        
        $existPaciente = cita::where([
        ['paciente_id', '=', $paciente->id],
        ['Fecha_hora', '=', $request->Fecha_Hora],
        ])->first();
        
        $existTerapista = cita::where([
        ['terapista_id', '=', $request->terapista_id],
        ['Fecha_hora', '=', $request->Fecha_Hora],
        ])->first();
        
        $bag = new MessageBag();
        
        if($existPaciente){
            
            $bag->add('paciente', 'La cita ya se encuentra registrada para este paciente');
            
        }
        
         if($existTerapista){
            
            $bag->add('terapista_id', 'El terapista ya tiene una cita a esta hora');
            
        }
        

        if($bag->any())
        return back()
            ->with('errors',$bag)
            ->withInput();


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
        $terapias= Terapia::All();
        $patalogias= Patologia::All();
        
        return view('Citas.modificar')->with('terapistas',$terapistas)->with('terapias',$terapias)->with('patologias',$patalogias)->with('cita',$cita);
    }
    
    
    
    public function delete(Cita $cita){
        $cita->delete();
        return redirect('cita/index');
    }
    
    public function eliminar(Cita $cita){
        
        return view('Citas.eliminar')->with('cita', $cita);
    }
    
    
    public function put(Request  $request, Cita $cita){

        $paciente = $cita->paciente;

        $this->Validate($request,
        ['Fecha_Hora' => ['required'],
        'terapista_id' => ['required']]);
        
        
        
        
        $existPaciente = cita::where([
        ['paciente_id', '=', $paciente->id],
        ['Fecha_hora', '=', $request->Fecha_Hora],
        ])->first();
        
        $existTerapista = cita::where([
        ['terapista_id', '=', $request->terapista_id],
        ['Fecha_hora', '=', $request->Fecha_Hora],
        ])->first();
        
        $bag = new MessageBag();
        
        if($existPaciente && $existPaciente->id != $cita->id){
        
            $bag->add('paciente', 'La cita ya se encuentra registrada para este paciente');
            
        }
        
         if($existTerapista && $existPaciente->id != $cita->id ){
            
            $bag->add('terapista_id', 'El terapista ya tiene una cita a esta hora');
            
        }
        

        if($bag->any())
        return back()
            ->with('errors',$bag)
            ->withInput();









        
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