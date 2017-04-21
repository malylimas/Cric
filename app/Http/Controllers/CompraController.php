<?php

namespace App\Http\Controllers;

use App\Compra;
use App\proveedores;
use Illuminate\Http\Request;

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
        return View('Compras.index')->with('compra', $compra);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    
    {
        $proveedores = Proveedores ::all();

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
        
        
        $compra = Compras::create([
        'Fecha'=>$request->Fecha,
        'Descripcion'=>$request->Descripcion,
        'proveedores_id'=> $request->provedores_id,
        'NumeroFactura'=>$request->NumeroFactura,
        ]);


        
        
        return redirect('Compras');
    }
    
     

       public function modificar(compras $compra){
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
