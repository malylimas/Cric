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
    <div class="contianer">
    <table class="table table-responsive table-striped table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Identidad</th>
          <th>Nombre Paciente</th>
          <th>Terapista</th>
          <th>Tipo De Terapia</th>
          <th>Patología</th>
          <th>Fecha Hora</th>
          <th>Acciones</th>

        </tr>
      </thead>
      <tbody>
        @foreach ($citas as $cita)
        <tr>

          <th>{{ $cita->id }}</th>
           <td>{{ $cita->paciente->Identidad}}</td>
          <td>{{ $cita->paciente->Nombre_Paciente}}</td>
          <td>{{ $cita->terapista->Nombre}}</td>
          <td>{{ $cita->Patologia->terapia->Nombre}}</td>
          <td>{{ $cita->Patologia->Nombre_Patologia}}</td>
          <td>{{ $cita->Fecha_Hora}}</td>
          <td>

            <div class="btn-group" role="group" aria-label="...">

              <a href="modificar/{{$cita->id}}"><i class="material-icons text-info">edit</i></a>
              <a href="/cita/imprimir/{{$cita->id}}"> <i class="material-icons">print</i></a>
            </div>

          </td>


          </center>



          @endforeach
      </tbody>
    </table>
       </div>
       {{ $citas->links() }} 
  </div>
</div>
@endsection