<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expediente;


class ExpedienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function crear (){
        return view('expediente.crear');
    }

    public function store(Request $request){
        
        Expediente::create([
            'Nombre_Paciente'=>$request->Nombre_Paciente,
            'Direccion' => $request->Direccion, 
            'Observacion' => $request->Observacion,
            'Telefono' => $request->Telefono,
            'Identidad' => $request->Identidad,
            'Sexo' => $request->Sexo,

        ]);

        return redirect('expediente/index');
    }

     public function index(){
        $expedientes = Expediente::withTrashed()->get();
        return view('expediente.index')->with('expedientes', $expedientes);
    }


    public function modificar(Expediente $expediente){
        return view('expediente.modificar')->with('expediente',$expediente);
    }

    public function delete(Expediente $expediente){
        $expediente->delete();
        return redirect('expediente/index');
    }

    public function eliminar(Expediente $expediente){
        
        return view('expediente.eliminar')->with('expediente', $expediente);
    }


     public function put(Request  $request, Expediente $expediente){
       
        $expediente->Nombre_Paciente= $request->Nombre_Paciente;
        $expediente->Direccion=$request->Direccion;
        $expediente->Observacion= $request->Observacion;
        $expediente->Telefono=$request->Telefono;
        $expediente->Identidad= $request->Identidad;
        $expediente->Sexo=$request->Sexo;
    
        $expediente->save();
        return redirect('expediente/index');
        
    }
    public function habilitar ($id){
         $expediente = Expediente::withTrashed()->find($id);
         return view ('expediente.habilitar')->with('expediente', $expediente);

     }

     public function success($id) {
        $expediente = Expediente::withTrashed()->find($id);
        $expediente->restore();
        return redirect('expediente/index');
     }  

     public function Expediente(Expediente $Expediente){
        return view('expediente.expediente')->with('expediente',$expediente);
    }
}
     


