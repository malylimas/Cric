<?php

namespace App\Http\Controllers;

use App\Factura;
use Illuminate\Http\Request;
use App\Paciente;
use App\cita;


class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturas = Factura::paginate(8);
        return View('Factura.index')->with('facturas',$facturas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $paciente = Paciente::where('Identidad', $request->numeroIdentidad)->first();

        
        $citas = cita::with('patologia.terapia')->whereNull('factura_id')->where('paciente_id', $paciente->id)->get();

        $precio = 0.0;

        foreach($citas as $cita){
            $precio = $precio + $cita->patologia->terapia->Precio;
        }

        
        return View('Factura.crear')->with('paciente',$paciente)->with('citas',$citas) ->with('precio',$precio);
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
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show(Factura $factura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function edit(Factura $factura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Factura $factura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Factura $factura)
    {
        //
    }
}
