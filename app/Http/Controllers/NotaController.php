<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
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
        
        $cursos = DB::table('matriculas')
        ->join('grados', 'grados.id', '=', 'matriculas.grado_id')        
        ->select('grados.id as id', 'grados.nombre as nombre', 'matriculas.ano as anio',DB::raw('count( matriculas.id) as cantidadAlumnos'))
        ->groupby('id','nombre','anio')
        ->having('anio',$year)
        ->get();
        
    
        
        return view('Notas.index')->with('cursos',$cursos);
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
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