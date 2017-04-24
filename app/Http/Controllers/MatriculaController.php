<?php

namespace App\Http\Controllers;

use App\Matricula;
use App\Grado;
use App\Alumno;
use Illuminate\Http\Request;
use Carbon\Carbon;
class MatriculaController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        //
        $matriculas = Matricula::paginate(8);
        return view('Matriculas.index')->with('matriculas',$matriculas);
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
        $alumnos = Alumno::all();
        $grados = Grado::all();
        
        return view('Matriculas.crear')->with('alumnos',$alumnos)->with('grados',$grados);
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
        
        //
        $this->validate($request, [
        'ano' => 'required|min:1',
        'alumno_id' => 'required',
        'grado_id' => 'required',
        ]);
        
        Matricula::create([
        'ano' => $request->ano,
        'alumno_id' => $request->alumno_id,
        'grado_id' => $request->grado_id,
        'fecha' =>   Carbon::now()
        ]);
        
        
        return redirect('matriculas');
    }
    
    /**
    * Display the specified resource.
    *
    * @param  \App\Matricula  $matricula
    * @return \Illuminate\Http\Response
    */
    public function show(Matricula $matricula)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Matricula  $matricula
    * @return \Illuminate\Http\Response
    */
    public function edit(Matricula $matricula)
    {
        //
        $alumnos = Alumno::all();
        $grados = Grado::all();
        
        return view('Matriculas.modificar')->with('alumnos',$alumnos)->with('grados',$grados)->with('matricula',$matricula);
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Matricula  $matricula
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Matricula $matricula)
    {
        //
        $this->validate($request, [
        'ano' => 'required|min:1',
        'alumno_id' => 'required',
        'grado_id' => 'required',
        ]);
        
        
        $matricula->ano = $request->ano;
        $matricula->alumno_id = $request->alumno_id;
        $matricula->grado_id = $request->grado_id;
        $matricula->fecha = Carbon::now();
        
        $matricula->save();
        
        return redirect('matriculas');
        
        
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Matricula  $matricula
    * @return \Illuminate\Http\Response
    */
    public function destroy(Matricula $matricula)
    {
        //
    }
}