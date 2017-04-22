@extends('layouts.app') @section('content')
<div>
  <div class="row">
    <a class="btn btn-primary" href="proveedores/create"> Crear Proveedores</a>
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
               <th>
              <center><b>Imprimir</b></center>
          </tr>
        </thead>
        <tbody>
          @foreach ($proveedores as $proveedore)
          <tr>
            <th scope="row">{{ $proveedore->id }}</th>
            <td>{{ $proveedore->Nombre }}</td>

            <td>
              <center>
                <div class="btn-group" role="group" aria-label="...">
                  <a type="button" class="btn btn-primary" href="proveedores/{{$proveedore->id}}/edit">Modificar</a> 
                  @if($proveedore->trashed())
                 @endif
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