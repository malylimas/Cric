<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;
use App\nivel;
use App\municipio;
use App\departamento;

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
        
        Paciente::create([
           
            'Identidad' => $request->Identidad,
            'Nombre_Paciente'=>$request->Nombre_Paciente,
            'Direccion_Actual' => $request->Direccion_Actual, 
            'Fecha_Nacimiento' => $request->Fecha_Nacimiento,
            'Edad' =>$request->Edad,
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
        return view('Paciente.index')->with('pacientes', $pacientes);
    }


    public function modificar(Paciente $paciente){
        return view('Paciente.modificar')->with('paciente',$paciente);
    }

    public function delete(Paciente $paciente){
        $paciente->delete();
        return redirect('Paciente/index');
    }

    public function eliminar(Paciente $paciente){
        
        return view('Paciente.eliminar')->with('paciente', $paciente);
    }


     public function put(Request  $request, Expediente $paciente){
        $paciente->Identidad= $request->Identidad;
        $paciente->Nombre_Paciente= $request->Nombre_Paciente;
        $paciente->Direccion_Actual=$request->Direccion_Actual;
        $paciente->Fecha_Nacimiento= $request->Fecha_Nacimiento;
        $paciente->Edad=$request->Edad;
        $paciente->Telefono=$request->Telefono;
        $paciente->Ocupacion=$request->Ocupacion;
        $paciente->nivel_id=$request->nivel_id;
        $paciente->municipio_id=$request->municipio_id;
        $paciente->departamento_id=$request->departamento_id;   
        $paciente->save();
        return redirect('pacientes/index');
        
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
}
     


