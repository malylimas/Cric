@extends('layouts.form') 

@section('form-content')
    @define $pageTitle = 'Pacientes Atendidos'
<div>
  <div class="row">
    <div class="page-header">
     <center>
     <h1>Fundacion Centro De Rehabilitacion Integral De Comayagua (CRIC)</h1>
     <h3> Dr Marcial Ponce Ochoa</h3>
     <h3> Pacientes Atendidos </h3>
    </div>
    <center>
    <form class="form-inline" action="/Paciente/pacientesatendiidos/{{$paciente->id}}">
      <div class="form-group">
        <label for="exampleInputName2">Fecha</label>
        <input type="date" class="form-control" id="exampleInputName2" name="fecha" placeholder="Jane Doe" value="{{$fecha}}">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail2">Diarios</label>
        <input type="date" class="form-control" id="exampleInputName2" name="diarios" placeholder="Jane Doe" value="{{$diarios}}">

      </div>
       
       
      <button type="submit" class="btn btn-primary">Buscar Pacientes</button>
      <input type = "button" name="imprimir" onclick = "printDiv ('imprimirPacientes')"class="btn btn-default btn-lg active"id="ImprimirPaten" value = "imprimir" />
      <div id = "Imprimir">
     </form>
    </div>
  
  

  <div id="imprimirPacientes">
    <div class="page-header">  
    </div>
    <div class="row">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre Paciente</th>
            <th>Patologia</th>
            <th>Fecha Hora</th>
            <th>Terapista</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($citas as $cita)
          <tr>

            <th>{{ $cita->id }}</th>
            <th>{{ $cita->paciente->Nombre_Paciente}}</th>
            <td>{{ $cita->Patologia->Nombre_Patologia}}</td>
            <td>{{ $cita->Fecha_Hora}}</td>
            <td>{{ $cita->terapista->Nombre}}</td>


            <tr>


              @endforeach
        </tbody>
      </table>

    </div>
  </div>


  @endsection