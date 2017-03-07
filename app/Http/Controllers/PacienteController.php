<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expediente;


class PacienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function crear (){
        return view('Paciente.crear');
    }

    public function store(Request $request){
        
        Paciente::create([
            'Identidad' => $request->Identidad,
            'Nombre_Paciente'=>$request->Nombre_Paciente,
            'Direccion_Actual' => $request->Direccion_Actual, 
            'Fecha_Nacimiento' => $request->Observacion,
            'Telefono' => $request->Telefono,
            'Ocupacion' => $request->Ocupacion,
            'Sexo' => $request->Sexo,

        ]);

        return redirect('Paciente/index');
    }

     public function index(){
        $pacientes = Paciente::withTrashed()->get();
        return view('Paciente.index')->with('pacientes', $pacientes);
    }


    public function modificar(Paciente $paciente){
        return view('Paciente.modificar')->with('Paciente',$paciente);
    }

    public function delete(Paciente $paciente){
        $paciente->delete();
        return redirect('Paciente/index');
    }

    public function eliminar(Paciente $paciente){
        
        return view('Paciente.eliminar')->with('Paciente', $paciente);
    }


     public function put(Request  $request, Expediente $paciente){
        $paciente->Identidad= $request->Identidad;
        $paciente->Nombre_Paciente= $request->Nombre_Paciente;
        $paciente->Direccion_Actual=$request->Direccion_Actual;
        $paciente->Fecha_Nacimiento= $request->Fecha_Nacimiento;
        $paciente->Edad=$request->Edad;
        $paciente->Telefono=$request->Telefono;
        $paciente->Ocupacion=$request->Ocupacion;
      
    
        $paciente->save();
        return redirect('Paciente/index');
        
    }
    public function habilitar ($id){
         $paciente = Paciente::withTrashed()->find($id);
         return view ('Paciente.habilitar')->with('Paciente', $paciente);

     }

     public function success($id) {
        $paciente = Paciente::withTrashed()->find($id);
        $paciente->restore();
        return redirect('Paciente/index');
     }  

     public function Paciente(Paciente $paciente){
        return view('Paciente.Paciente')->with('Paciente',$Paciente);
    }
}
     


