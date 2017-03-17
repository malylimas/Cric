@extends('layouts.app') 
@section('content')
<div>
  <div class="row">
    <div class="page-header">
      <h1 class="text-center">Disponibilidad</h1>
    </div>
    <form class="form-inline" action="/terapista/disponibilidad/{{$terapista->id}}">
      <div class="form-group">
        <label for="exampleInputName2">Fecha</label>
        <input type="date" class="form-control" id="exampleInputName2" name="fecha" placeholder="Jane Doe" value="{{$fecha}}">
      </div>
      <div class="input-group date">
        <input type="text"  class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail2">Tipo</label>
        <select class="form-control" name="tipo" id="exampleInputEmail2">
                
                    <option value="m" >Mensual</option>
                    <option value="d">Diarios</option>
               
      </select>
      </div>
      <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
  </div>




  <div id="imprimirDatos">
    <div class="page-header">
      <h2>{{$terapista->Nombre}}</h2>
    </div>
    <div class="row">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre Paciente</th>
            <th>Patologia</th>
            <th>Fecha Hora</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($citas as $cita)
          <tr>

            <th>{{ $cita->id }}</th>
            <th>{{ $cita->paciente->Nombre_Paciente}}</th>
            <td>{{ $cita->Patologia->Nombre_Patologia}}</td>
            <td>{{ $cita->Fecha_Hora}}</td>


            <tr>


              @endforeach
        </tbody>
      </table>

    </div>
  </div>

  
  @endsection

  @section('script')

  <script>
    

  </script>

  @endsection