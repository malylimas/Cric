@extends('layouts.app') @section('content')
<div>
 
  <div class="row">
    <form action="crear" method="GET" class="form-inline">
      <div class="form-group">
        <label class="sr-only" for="exampleInputEmail3">Numero Identidad</label>
        <input type="text" required name="numeroIdentidad" class="form-control" id="exampleInputEmail3" placeholder="Numero Identidad">
      </div>
      <button class="btn btn-primary"> Crear Cita</button>
    </form>

  </div>

  <div class="row">

    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Nombre_Paciente</th>
          <th>Terapista</th>
          <th>Patologia</th>
          <th>Fecha_Hora</th>
          <th>Acciones</th>
          <th>Imprimir</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($citas as $cita)
        <tr>

          <th>{{ $cita->id }}</th>
          <th>{{ $cita->paciente->Nombre_Paciente}}</th>
          <td>{{ $cita->terapista->Nombre}}</td>
          <td>{{ $cita->Patologia->Nombre_Patologia}}</td>
          <td>{{ $cita->Fecha_Hora}}</td>
          <td>
            <div class="btn-group" role="group" aria-label="...">

              <a type="button" class="btn btn-primary" href="modificar/{{$cita->id}}">Modificar</a> @if($cita->trashed())
              <a type="button" class="btn btn-success" href="habilitar/{{$cita->id}}">Habilitar</a> @else
              <a type="button" class="btn btn-danger" href="eliminar/{{$cita->id}}">Deshabilitar</a> @endif

            </div>

          </td>
          <td>
            <div class="panel-heading">
              <a href="/cita/imprimir/{{$cita->id}}"> <img src="/img/ImagenHTML2.jpg" border="0" width="30" height="30"></a>
          </td>
          </div>



          @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection