<?php

namespace App\Http\Controllers;

use App\Clase;
use Illuminate\Http\Request;

class ClaseController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        //
        $clases = Clase::paginate(8);
        
        return view('Clases.index')->with('clases',$clases);
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
        
        
        return view('Clases.crear');
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
        
        Clase::create([
        'nombre'=>$request->nombre,       
        
        ]);
        
        
        return redirect('clases');
        
    }
    
    /**
    * Display the specified resource.
    *
    * @param  \App\Clase  $clase
    * @return \Illuminate\Http\Response
    */
    public function show(Clase $clase)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Clase  $clase
    * @return \Illuminate\Http\Response
    */
    public function edit(Clase $clase)
    {
        //
        return view('Clases.modificar')->with('clase',$clase);
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Clase  $clase
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Clase $clase)
    {
        //
        $this->validate($request, [
        'nombre' => 'required|max:30|regex:/^[\pL\s\-]+$/u',
        ]);
        
        $clase->nombre= $request->nombre;
        $clase->save();

        return redirect('clases');
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Clase  $clase
    * @return \Illuminate\Http\Response
    */
    public function destroy(Clase $clase)
    {
        //
    }
}