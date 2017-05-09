@extends('layouts.app') @section('content')
<div>
  <div class="row">
    <a class="btn btn-primary" href="proveedores/create"> Crear Proveedores</a>
  </div>
  <br>
  <div class="row">
    <div class="contianer">
      <table class="table table-responsive table-striped table-hover">
        <thead>
          <tr>
            <th>
              #
            </th>
            <th>
              Nombre
            </th>
               <th>
                 Acciones
               </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($proveedores as $proveedore)
          <tr>
            <td scope="row">{{ $proveedore->id }}</td>
            <td>{{ $proveedore->Nombre }}</td>

            <td>

                <div class="btn-group" role="group" aria-label="...">
                  <a href="proveedores/{{$proveedore->id}}/edit">
                    <i class="text-info material-icons">edit</i>
                  </a>

                </div>


            </td>

        
          @endforeach
        </tbody>
      </table>
    </div>
    {{ $proveedores->links() }}
  </div>
</div>
@endsection