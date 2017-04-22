<?php

namespace App\Http\Controllers;

use App\Compra;
use App\proveedores;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compra = Compra::paginate(8);
         
         return View('Compras.index')->with('compras', $compra);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    
    {
        $proveedores = Proveedores::all();

        return View('Compras.crear')->with('proveedores',$proveedores);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $fecha = Carbon::createFromFormat('d/m/Y', $request->Fecha);
        
        $compra = Compra::create([
        'Fecha'=>$fecha,
        'Descripcion'=>$request->Descripcion,
        'proveedore_id'=> $request->proveedore_id,
        'cantidad'=> $request->cantidad,
        'NumeroFactura'=>$request->NumeroFactura,
        ]);


        
        
        return redirect('compra');
    }
    
     

       public function modificar(Compra $compra){
        return view('Compras.modificar')->with('compra',$compra);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra)
    {
        //
    }

     public function imprimir(Compra $compra){
        
        
        return view('Compras.Imprimir')->with('compra', $compra);
    }



}
