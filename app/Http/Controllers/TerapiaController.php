<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Terapia;
class TerapiaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function crear (){
        return view('terapia.crear');
    }

    public function store(Request $request){
        
        Terapia::create([
            'Nombre'=>$request->Nombre,
            'Precio' => $request->Precio,   

        ]);

        return redirect('terapia/index');
    }

     public function index(){
        $terapia = Terapia::withTrashed()->get();
        return view('terapia.index')->with('terapia', $terapia);
    }


    public function modificar(Terapia $terapia){
        return view('terapia.modificar')->with('terapia',$terapia);
    }

    public function eliminar(Terapia $terapia){
        
        return view('terapia.eliminar')->with('terapia', $terapia);
    }


     public function put(Request  $request, Terapia $terapia){
       
        $terapia->Nombre= $request->Nombre;
        $terapia->Precio=$request->Precio;
    
        $terapia->save();
        return redirect('terapia/index');
    }
}
