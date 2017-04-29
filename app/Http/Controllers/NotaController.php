<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Nota;

use App\Grado;
use App\Clase;
use App\Matricula;

use Illuminate\Http\Request;

class NotaController extends Controller
{
      /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        //
        $year = $request->year;
        $claseId= $request->claseId;

        $clases = Clase::all();
        $clase = Clase::find($claseId);

        
        $cursos = DB::table('matriculas')
        ->join('grados', 'grados.id', '=', 'matriculas.grado_id')        
        ->select('grados.id as id', 'grados.nombre as nombre', 'matriculas.ano as anio',DB::raw('count( matriculas.id) as cantidadAlumnos'))
        ->groupby('id','nombre','anio')
        ->having('anio',$year)
        ->get();
        
    
        
        return view('Notas.index')->with('cursos',$cursos)->with('year',$year)->with('clase',$clase)->with('clases', $clases)->with('claseId',$claseId);
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create(Request $request)
    {
        $year = $request->year;
        $claseId= $request->claseId;

    
        $clase = Clase::find($claseId);
        $grado = Grado::find($request->gradoId);

    
        $alumnos = Matricula::with('notas')                      
                         ->where('ano',$year)
                        ->where('grado_id', $grado->id)  

                        
                        ->get();

        
        return view('Notas.crear')->with('alumnos',$alumnos)->with('year',$year)->with('clase',$clase)->with('grado', $grado)->with('claseId',$claseId);
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        //
       $matriculas =  $request->input('matricula');
       $claseId =$request->claseId;
       foreach($matriculas as $key=>$value) {
            $matricula = $request->input('matricula.' . $key);
            $primerParcial = $request->input('primero.' . $key,0);
            $segundoParcial = $request->input('segundo.' . $key,0);
            $tercerarcial = $request->input('tercero.' . $key,0);
            $cuartoParcial = $request->input('cuarto.' . $key,0);

            $nota = Nota::updateOrCreate(
                ['clase_id'=>$claseId, 'matricula_id'=> $matricula],
                [
                    'matricula_id' => $matricula,
                    'clase_id'=>$claseId,
                    'primerParcial' => $primerParcial,
                    'segundoParcial' => $segundoParcial,
                    'tercerParcial' => $tercerarcial,
                    'cuartoParcial' => $cuartoParcial,
                ]
            );

            $nota->calcularPromedio();
            $nota->save();
        }

        return back();
    }
    
    /**
    * Display the specified resource.
    *
    * @param  \App\Nota  $nota
    * @return \Illuminate\Http\Response
    */
    public function show(Nota $nota)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Nota  $nota
    * @return \Illuminate\Http\Response
    */
    public function edit(Nota $nota)
    {
        //
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Nota  $nota
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Nota $nota)
    {
        //
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Nota  $nota
    * @return \Illuminate\Http\Response
    */
    public function destroy(Nota $nota)
    {
        //
    }
}