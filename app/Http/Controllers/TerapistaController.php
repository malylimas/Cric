<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Terapista;

class TerapistaController extends Controller
{
    //

    public function crear (){
        return view('terapista.crear');
    }

    public function store(Request $request){
        
        Terapista::create([
            'Nombre'=>$request->Nombre,
            'Telefono' => $request->Telefono,
            'Direccion' => $request->Direccion
        ]);
        
        return redirect('terapista/index');
    }

    public function index(){
        $terapistas = Terapista::all();
        return view('terapista.index')->with('terapistas', $terapistas);
    }

    public function modificar(Terapista $terapista){
        return view('terapista.modificar')->with('terapista',$terapista);
    }
    
    public function put(Request  $request, Terapista $terapista){
       
        $terapista->Nombre= $request->Nombre;
        $terapista->Telefono=$request->Telefono;
        $terapista->Direccion=$request->Direccion;

        $terapista->save();
        return redirect('terapista/index');
    }
    
}
