<?php

namespace App\Http\Controllers;

use App\Alumno;
use Illuminate\Http\Request;

use App\departamento;
use App\municipio;
use Carbon\Carbon;
class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $alumnos = Alumno::paginate(8);

        return view('Alumnos.index')->with('alumnos',$alumnos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $departamentos = departamento::all();
        $municipios = municipio::all();
        return view('Alumnos.crear')->with('departamentos',$departamentos)->with('municipios',$municipios);
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
         $this->validate($request, [
        'identidad' => 'required|digits:13|unique:alumnos,identidad',
        'nombre' => 'required|max:30|regex:/^[\pL\s\-]+$/u',
        'direccion' => 'required|max:255',
        'fechaNacimiento' => 'required|date_format:d/m/Y|before:'. date('Y-m-d'),
        'telefono' => 'required|digits:8',
        'nombreEncargado' => 'required|max:30|regex:/^[\pL\s\-]+$/u',        
        'municipio_id' => 'required|exists:municipio,id',
        'departamento_id' => 'required|exists:departamento,id',
        
        
        ]);
        
       
         Alumno::create([
        'identidad' => $request->identidad,
        'nombre' => $request->nombre,
        'direccion' => $request->direccion,
        'fechaNacimiento' => Carbon::createFromFormat('d/m/Y', $request->fechaNacimiento),
        'telefono' => $request->telefono,
        'departamento_id' => $request->departamento_id,
        'nombreEncargado' => $request->nombreEncargado,
        'municipio_id' => $request->municipio_id        
        ]);
        
        return redirect('alumnos');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        //
        $departamentos = departamento::all();
        $municipios = municipio::all();
        return view('Alumnos.modificar')->with('departamentos',$departamentos)->with('municipios',$municipios)->with('alumno',$alumno);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        //
         $this->validate($request, [
        'identidad' => 'required|digits:13',
        'nombre' => 'required|max:30|regex:/^[\pL\s\-]+$/u',
        'direccion' => 'required|max:255',
        'fechaNacimiento' => 'required|date_format:d/m/Y|before:'. date('Y-m-d'),
        'telefono' => 'required|digits:8',
        'nombreEncargado' => 'required|max:30|regex:/^[\pL\s\-]+$/u',        
        'municipio_id' => 'required|exists:municipio,id',
        'departamento_id' => 'required|exists:departamento,id',
        
        
        ]);
        
       
         
        $alumno->identidad = $request->identidad;
        $alumno->nombre = $request->nombre;
        $alumno->direccion = $request->direccion;
        $alumno->fechaNacimiento = Carbon::createFromFormat('d/m/Y', $request->fechaNacimiento);
        $alumno->telefono = $request->telefono;
        $alumno->departamento_id = $request->departamento_id;
        $alumno->nombreEncargado = $request->nombreEncargado;
        $alumno->municipio_id = $request->municipio_id;
        
        $alumno->save();
        return redirect('alumnos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        //
    }
}
