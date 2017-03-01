@extends('layouts.app')

@section('content')
<div>
    <div class ="row">
        <a class="btn btn-primary" href="crear" > Crear Expediente</a>
    </div>
    
    <div class = "row">

          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre Paciente</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Observacion</th>
                <th>Identidad</th>
                <th>Telefono</th>
                <th>Sexo</th>
                <th>Acciones</th>
                
              </tr>
            </thead>
            <tbody>
            @foreach ($expedientes as $expediente)
              <tr>
                <th scope="row">{{ $expediente->id }}</th>
                <td>{{ $expediente->Nombre_Paciente }}</td>
                <td>{{ $expediente->Telefono }}</td>
                <td>{{ $expediente->Direccion }}</td>
                <td>{{ $expediente->Observacion}}</td>
                <td>{{ $expediente->Identidad}}</td>
                <td>{{ $expediente->Sexo}}</td>
                <td>
                  <div class="btn-group" role="group" aria-label="...">
                    <a type="button" class="btn btn-primary" href="modificar/{{$expediente->id}}">Modificar</a>
                    @if($expediente->trashed())
                    <a type="button" class="btn btn-success" href="habilitar/{{$expediente->id}}" >Habilitar</a>
                    @else
                    <a type="button" class="btn btn-danger" href="eliminar/{{$expediente->id}}" >Deshabilitar</a>
                    @endif
                  </div>

                </td>
              </tr>
              
              @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection
 

