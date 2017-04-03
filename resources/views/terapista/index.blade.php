@extends('layouts.app')

@section('content')
<div>
    <div class ="row">
        <a class="btn btn-primary" href="crear" > Crear Terapista</a>
    </div>
    <br>
    <div class = "row">

          <table class="table table-bordered">
            <thead>
              <tr>
               <th><center><b>#</b></center></th>
               <th><center><b>Nombre</b></center></th>
               <th><center><b>Teléfono</b</center></th>
              <th><center><b>Dirección</b></center></th>
              <th><center><b>Acciones</b></center></th>
              <th><center><b> Disponibilidad</b></center> </th>
       
                
              </tr>
            </thead>
            <tbody>
            @foreach ($terapistas as $terapista)
              <tr>
                <th scope="row">{{ $terapista->id }}</th>
                <td>{{ $terapista->Nombre }}</td>
                <td>{{ $terapista->Telefono }}</td>
                <td>{{ $terapista->Direccion }}</td>
                
                <td>
                   <center>
                  <div class="btn-group" role="group" aria-label="...">
                 <a type="button" class="btn btn-primary" href="modificar/{{$terapista->id}}">Modificar</a>
                    @if($terapista->trashed())
                  <a type="button" class="btn btn-success" href="habilitar/{{$terapista->id}}" >Activar</a>
                    @else
                  <a type="button" class="btn btn-danger" href="eliminar/{{$terapista->id}}" >Dar de Baja</a>
                    @endif
                  </div>
                  </center>

                </td>

                <td>
                   <center>
                  <div class="btn-group" role="group" aria-label="...">
                  <a type="button" class="btn btn-primary" href="disponibilidad/{{$terapista->id}}/?tipo=d&fechaDiaria={{$now}}">Disponibilidad</a>
                  </div>
                  </center>
                </tr>

              
              
              @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection
 

