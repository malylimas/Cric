<?php

namespace App\Http\Controllers;

use App\Factura;
use Illuminate\Http\Request;
use App\Paciente;
use App\cita;
use App\Descuento;
use Illuminate\Validation\Rule;
use Illuminate\Support\MessageBag;

use Carbon\Carbon;

use App\Events\CrearIngreso;
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
        
        $descuentos = Descuento::all();
        
        $citas = cita::with('patologia.terapia')->whereNull('factura_id')->where('paciente_id', $paciente->id)->get();
        
        $subTotal = 0.0;
        
        foreach($citas as $cita){
            $subTotal = $subTotal + $cita->patologia->terapia->Precio;
        }
        
        
        return View('Factura.crear')->with('paciente',$paciente)->with('citas',$citas) ->with('subTotal',$subTotal)->with('descuentos',$descuentos);
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $this->validate($request, [
        'SubTotal' => 'required|min:0|numeric',
        'Total' => 'required|min:0|numeric',
        'descuento_id' => 'required'
        ]);
        $fecha = Carbon::now();
        
        
        $factura = Factura::create([
        'Fecha_Hora'=>$fecha,
        'cita_id'=>$request->cita_id,
        'paciente_id'=> $request->paciente_id,
        'SubTotal'=>$request->SubTotal,
        'Total' => $request->Total,
        'descuento_id'=>$request->descuento_id
        
        ]);
        $cita = cita::find($request->cita_id);
        $cita->factura_id= $factura->id;
        $cita->save();
        $detalle ="Pago de terapia del paciente " . $cita->paciente->Nombre_Paciente;
        
        $event=new CrearIngreso($detalle,$factura->Total,1,"caja");

        event($event);

        return $event;
        
        return redirect('factura');
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
    
    public function imprimir(Factura $factura){
        
        
        return view('factura.Imprimir')->with('factura', $factura);
    }
    
    
}