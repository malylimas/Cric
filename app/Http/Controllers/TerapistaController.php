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
        
        return redirect('index');
    }

    public function index(){
        $terapistas = Terapista::all();
        return view('terapista.index')->with('terapistas', $terapistas);
    }

    public function modificar($id){
        $terapista= Terapista::find($id);

        return view('terapista.modificar')->with('terapista',$terapista);
    }
    
    public function put($id){
        $terapista= Terapista::find($id);

        return view('terapista.modificar')->with('terapista',$terapista);
    }
}
