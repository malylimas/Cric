@extends('layouts.app') @section('content')
<div>

  <div class="row">
    <div class="col-md-4">
      <form action="crear" method="GET" class="form-inline">
        <div class="form-group">
          <label class="sr-only" for="exampleInputEmail3">Numero de Identidad del Paciente</label>
          <input type="text" required name="numeroIdentidad" class="form-control" id="exampleInputEmail3" placeholder="Identidad del Paciente">
        </div>
        <button class="btn btn-primary"> Crear Factura</button>
      </form>
    </div>
  
  </div>
   </br>
  <div class="row">
    <div class="contianer">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th><center><b>#</center></b></th>
          <th><center><b>Identidad</center></b></th>
          <th><center><b>Nombre Paciente</center></b></th>
          <th><center><b>Fecha_Hora</center></b></th>
          <th><center><b>Precio</center></b></th>
          <th><center><b>SubTotal</center></b></th>
          <th><center><b>Total</center></b></th>
          <th><center><b>Acciones</center></b></th>
          <th><center><b>Imprimir</center></b></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($facturas as $factura)
        <tr>

          <th>{{ $factura->id }}</th>
           <th>{{ $factura->paciente->Identidad}}</th>
          <th>{{ $factura->paciente->Nombre_Paciente}}</th>
          <td>{{ $factura->Fecha Hora}}</td>
          <td>{{ $factura->Patologia->terapia->Precio}}</td>
          <td>{{ $factura->SubTotal}}</td>
          <td>{{ $factura->Total}}</td>
          <td>
            <center>
            <div class="btn-group" role="group" aria-label="...">

              <a type="button" class="btn btn-primary" href="modificar/{{$factura->id}}">Modificar</a> @if($factura->trashed())
              
              @endif

            </div>
            </center>
          </td>
          <td>
             <center>
            <div class="panel-heading">
              <a href="/factura/imprimir/{{$factura->id}}"> <img src="/img/ImagenHTML2.jpg" border="0" width="30" height="30"></a>
          </td>
          </div>
          </center>



          @endforeach