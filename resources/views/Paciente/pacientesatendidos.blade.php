@extends('layouts.app') @section('content')
<div>
  <div class="row">
    <div class="page-header">
      <h1 class="text-center">Paciente Atendidos</h1>
    </div>
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
     </form>
    </div>

  <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-8"><img src="/img/ImagenHTML2.jpg" border="0" width="40" height="30"></div>
    <input name="imprimir" type="button" id="ImprimirPac" onClick="printDiv('imprimirPacientes')" value="Imprimir">
  </div>


  <div id="imprimirPacientes">
    <div class="page-header">  
    </div>
    <div class="row">
      <table class="table table-hover">
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

  <script>
    function printDiv(divName) {
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
    }
  </script>
  @endsection