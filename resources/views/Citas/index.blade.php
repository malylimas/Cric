@extends('layouts.app') @section('content')
<div>

  <div class="row">
    <div class="col-md-4">
      <form action="crear" method="GET" class="form-inline">
        <div class="form-group">
          <label class="sr-only" for="exampleInputEmail3">Numero de Identidad del Paciente</label>
          <input type="text" required name="numeroIdentidad" class="form-control" id="exampleInputEmail3" placeholder="Identidad del Paciente">
        </div>
        <button class="btn btn-primary"> Crear Cita</button>
      </form>
    </div>
  
  </div>
   </br>
  <div class="row">

    <table class="table table-bordered">
      <thead>
        <tr>
          <th><center><b>#</center></b></th>
          <th><center><b>Identidad</center></b></th>
          <th><center><b>Nombre Paciente</center></b></th>
          <th><center><b>Terapista</center></b></th>
          <th><center><b>Tipo De Terapia</center></b></th>
          <th><center><b>Patología</center></b></th>
          <th><center><b>Fecha Hora</center></b></th>
          <th><center><b>Acciones</center></b></th>
          <th><center><b>Imprimir</center></b></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($citas as $cita)
        <tr>

          <th>{{ $cita->id }}</th>
           <th>{{ $cita->paciente->Identidad}}</th>
          <th>{{ $cita->paciente->Nombre_Paciente}}</th>
          <td>{{ $cita->terapista->Nombre}}</td>
          <td>{{ $cita->Patologia->terapia->Nombre}}</td>
          <td>{{ $cita->Patologia->Nombre_Patologia}}</td>
          <td>{{ $cita->Fecha_Hora}}</td>
          <td>
            <center>
            <div class="btn-group" role="group" aria-label="...">

              <a type="button" class="btn btn-primary" href="modificar/{{$cita->id}}">Modificar</a> @if($cita->trashed())
              
              @endif

            </div>
            </center>
          </td>
          <td>
             <center>
            <div class="panel-heading">
              <a href="/cita/imprimir/{{$cita->id}}"> <img src="/img/ImagenHTML2.jpg" border="0" width="30" height="30"></a>
          </td>
          </div>
          </center>



          @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection