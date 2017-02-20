@extends('layouts.app')

@section('content')
<div>
    <div class ="row">
        <a class="btn btn-primary" href="crear" > Crear Terapista</a>
    </div>
    
    <div class = "row">

          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Acciones</th>
                
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
                  <div class="btn-group" role="group" aria-label="...">
                    <a type="button" class="btn btn-default" href="modificar/{{$terapista->id}}">Modificar</a>
                    <a type="button" class="btn btn-default" href="eliminar/{{$terapista->id}}" >Eliminar</a>
                  </div>

                </td>
              </tr>
              
              @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection
 
