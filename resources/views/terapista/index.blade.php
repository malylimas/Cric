@extends('layouts.app')

@section('content')
<div>
    <div>
        <a class="btn btn-primary" href="crear" > Crear Terapista</a>
    </div>
    <div>


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
          <button type="button" class="btn btn-default">Modificar</button>
          <button type="button" class="btn btn-default">Eliminar</button>
        </div>

      </td>
    </tr>
    
    @endforeach
  </tbody>
</table>

@endsection
    </div>

</div>


