<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patologia;
use App\Terapia;

class PatologiaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function crear (){
        $terapias = Terapia::All();
        return view('Patologia.crear')->with('terapias',$terapias);
    }

    public function store (Request $request){
        
        patologia::create([
            'Nombre_Patologia'=>$request->Nombre_Patologia,
            'terapia_id' => $request->terapia_id,   

        ]);

        return redirect('Patologia/index');
    }

    public function index(){
        $patologias = Patologia::withTrashed()->get();
        return view('Patologia.index')->with('patologias', $patologias);
    }

    
    public function modificar(Patologia $Patologia){        
        $terapias = Terapia::All();
        return view('Patologia.modificar')->with('patologia', $Patologia)->with('terapias', $terapias);
    }


    public function delete(Patologia $Patologia){
        $Patologia->delete();
        return redirect('Patologia/index');
    }

      public function eliminar(Patologia $Patologia){
        
        return view('Patologia.eliminar')->with('Patologia', $Patologia);
    }


       public function put(Request  $request, Patologia $Patologia){
       
        $Patologia->Nombre_Patologia= $request->Nombre_Patologia;
        $Patologia->terapia_id=$request->terapia_id;
    
        $Patologia->save();
        return redirect('Patologia/index');
    }

       public function habilitar ($id){
         $Patologia = Patologia::withTrashed()->find($id);
         return view ('Patologia.habilitar')->with('Patologia', $Patologia);

     }

      public function success($id) {
        $Patologia = Patologia::withTrashed()->find($id);
        $Patologia->restore();
        return redirect('Patologia/index');
     }  

    
     


}

