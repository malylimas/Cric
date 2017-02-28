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
        $terapias = Terapia::withTrashed()->get();
        return view('terapia.index')->with('terapias', $terapias);
    }


    public function modificar(Terapia $terapia){
        return view('terapia.modificar')->with('terapia',$terapia);
    }

    public function delete(Terapia $terapia){
        $terapia->delete();
        return redirect('terapia/index');
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
    public function habilitar ($id){
         $terapia = Terapia::withTrashed()->find($id);
         return view ('terapia.habilitar')->with('terapia', $terapia);

     }

     public function success($id) {
        $terapia = Terapia::withTrashed()->find($id);
        $terapia->restore();
        return redirect('terapia/index');
     }  

     public function Patologia(Terapia $terapia){
        return view('terapia.patologia')->with('terapia',$terapia);
    }
}
     

