@extends('layouts.app') @section('content')
<div>
  <div class="row">
    <a class="btn btn-primary" href="crear"> Crear Proveedores</a>
  </div>
  <br>
  <div class="row">
    <div class="contianer">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>
              <center><b>#</b></center>
            </th>
            <th>
              <center><b>Nombre</b></center>
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($proveedores as $proveedores)
          <tr>
            <th scope="row">{{ $proveedores->id }}</th>
            <td>{{ $proveedores->Nombre }}</td>

            <td>
              <center>
                <div class="btn-group" role="group" aria-label="...">
                  <a type="button" class="btn btn-primary" href="modificar/{{$proveedores->id}}">Modificar</a> @if($proveedores->trashed())
                 
                </div>
              </center>

            </td>

        
          @endforeach
        </tbody>
      </table>
    </div>
    {{ $proveedores->links() }}
  </div>
</div>
@endsection