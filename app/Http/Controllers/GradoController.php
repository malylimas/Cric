<?php

namespace App\Http\Controllers;

use App\Grado;
use Illuminate\Http\Request;


class GradoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $grados = Grado::paginate(8);

        return view('Grados.index')->with('grados',$grados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Grados.crear');
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
        'nombre' => 'required|max:30|regex:/^[\pL\s\-]+$/u',
        ]);
        
        Grado::create([
        'nombre'=>$request->nombre,       
        
        ]);
        
        
        return redirect('grados');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function show(Grado $grado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function edit(Grado $grado)
    {
        //

        return view('Grados.modificar')->with('grado',$grado);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grado $grado)
    {
        //
        $this->validate($request, [
        'nombre' => 'required|max:30|regex:/^[\pL\s\-]+$/u',
        ]);
        
        $grado->nombre = $request->nombre;

        $grado->save();
        
        return redirect('grados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grado $grado)
    {
        //
    }
}
