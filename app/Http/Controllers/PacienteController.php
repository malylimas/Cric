<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Paciente;
use App\nivel;
use App\municipio;
use App\departamento;
use Carbon\Carbon;
use App\cita;


class PacienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function crear (){
        $niveles= nivel:: All();
        $municipios= municipio:: All();
        $departamentos= departamento::All();
        return view('Paciente.crear')->with('niveles',$niveles)->with('municipios',$municipios)->with('departamentos',$departamentos);
    }

    public function store(Request $request){
        
      $validator = Validator::make($request->all(), [
        'Identidad' => 'required|digits:13|unique:pacientes,Identidad',
        'Nombre_Paciente' => 'required|max:30|regex:/^[\pL\s\-]+$/u',
        'Direccion_Actual' => 'required|max:255',
        'Fecha_Nacimiento' => 'required|date_format:d/m/Y|before:'. date('Y-m-d'),
        'Telefono' => 'required|max:10',
        'Ocupacion' => 'required|max:30|regex:/^[\pL\s\-]+$/u',
        'nivel_id' => 'required|exists:nivel,id',
        'municipio_id' => 'required|exists:departamento,id',
        'departamento_id' => 'required|exists:municipio,id',
        
        
        ]);


        if ($validator->fails()) {
            return redirect('Paciente/crear')
                        ->withErrors($validator)
                        ->withInput();
        }
        $fecha = Carbon::createFromFormat('d/m/Y',$request->Fecha_Nacimiento);

        $age = $fecha->diff(Carbon::now())->format('%y');
      
        Paciente::create([
           
            'Identidad' => $request->Identidad,
            'Nombre_Paciente'=>$request->Nombre_Paciente,
            'Direccion_Actual' => $request->Direccion_Actual, 
            'Fecha_Nacimiento' => $request->Fecha_Nacimiento,
            'Edad' =>$age,
            'Telefono' => $request->Telefono,
            'Ocupacion' => $request->Ocupacion,
            'nivel_id'=>$request->nivel_id,
            'municipio_id'=>$request->municipio_id,
            'departamento_id'=>$request->departamento_id,
            
        ]);

        return redirect('Paciente/index');
    }

     public function index(){
        $pacientes = Paciente::withTrashed()->get();
        $var  = Carbon::today();
        return view('Paciente.index')->with('pacientes', $pacientes)->with('var',$var);

    }


    public function modificar(Paciente $paciente){
        $niveles= nivel:: All();
        $municipios= municipio:: All();
        $departamentos= departamento::All();
        return view('Paciente.modificar')->with ('paciente',$paciente)->with('niveles',$niveles)->with('municipios',$municipios)->with('departamentos',$departamentos);
        
    }

    public function delete(Paciente $paciente){
        $paciente->delete();
        return redirect('Paciente/index');
    }

    public function eliminar(Paciente $paciente){
        
        return view('Paciente.eliminar')->with('paciente', $paciente);
    }


     public function put(Request  $request, Paciente $paciente){

        $validator = Validator::make($request->all(), [
        'Identidad' => 'required|digits:13',
        'Nombre_Paciente' => 'required|max:30|regex:/^[\pL\s\-]+$/u',
        'Direccion_Actual' => 'required|max:255',
        'Fecha_Nacimiento' => 'required|date_format:d/m/Y|before:'. date('Y-m-d'),
        'Telefono' => 'required|max:10',
        'Ocupacion' => 'required|max:30|regex:/^[\pL\s\-]+$/u',
        'nivel_id' => 'required|exists:nivel,id',
        'municipio_id' => 'required|exists:departamento,id',
        'departamento_id' => 'required|exists:municipio,id',
        
        
        ]);


        if ($validator->fails()) {
            return redirect('Paciente/crear')
                        ->withErrors($validator)
                        ->withInput();
        }
        $fecha = Carbon::createFromFormat('d/m/Y',$request->Fecha_Nacimiento);

        $age = $fecha->diff(Carbon::now())->format('%y');


        $paciente->Identidad= $request->Identidad;
        $paciente->Nombre_Paciente= $request->Nombre_Paciente;
        $paciente->Direccion_Actual=$request->Direccion_Actual;
        $paciente->Fecha_Nacimiento= $request->Fecha_Nacimiento;
        $paciente->Edad=$age;
        $paciente->Telefono=$request->Telefono;
        $paciente->Ocupacion=$request->Ocupacion;
        $paciente->nivel_id=$request->nivel_id;
        $paciente->municipio_id=$request->municipio_id;
        $paciente->departamento_id=$request->departamento_id;   
        $paciente->save();
        return redirect('Paciente/index');
        
    }
    public function habilitar ($id){
         $paciente = Paciente::withTrashed()->find($id);
         return view ('paciente.habilitar')->with('paciente', $paciente);

     }

     public function success($id) {
        $paciente = Paciente::withTrashed()->find($id);
        $paciente->restore();
        return redirect('paciente/index');
     }  

     public function Paciente(Paciente $paciente){
        return view('paciente.paciente')->with('paciente',$Paciente);
    }
    
     public function pacientesatendidos(Request $request, Paciente $paciente){
        $citas=[];
        $fecha =Carbon::createFromFormat('d/m/Y',$request->fecha);
        if($request->diarios ) 
        {
            $citas= cita::
            whereMonth('Fecha_Hora',$fecha->month)->
            whereYear('Fecha_Hora', $fecha->year)
            ->orderby('Fecha_Hora')
            ->get();
            
        }else{
            
            $citas= cita::
            whereMonth('Fecha_Hora',$fecha->month)->
            whereYear('Fecha_Hora', $fecha->year)->
            whereDay('Fecha_Hora', $fecha->day)
            ->orderby('Fecha_Hora')
            ->get();
        }
        
        
        return view('paciente.pacientesatendidos')->with('paciente', $paciente)->with('citas',$citas)->with('fecha',$fecha)->with('diarios', $request->diarios);
    }







}
     


