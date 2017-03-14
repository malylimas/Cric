
@extends('layouts.app')

@section('content')
<div>
    <div class ="row">
        <a class="btn btn-primary" href="crear" > Crear Terapia</a>
    </div>
    
    <div class = "row">

          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($terapias as $terapia)
              <tr>
                <th>{{ $terapia->id }}</th>
                <td>{{ $terapia->Nombre }}</td>
                <td>{{ $terapia->Precio }}</td>
                
                <td>
                  <div class="btn-group" role="group" aria-label="...">
                     <a type="button" class="btn btn-primary" href="modificar/{{$terapia->id}}">Modificar</a>
                      @if($terapia->trashed())
                    <a type="button" class="btn btn-success" href="habilitar/{{$terapia->id}}" >Activo</a>
                    @else
                    <a type="button" class="btn btn-danger" href="eliminar/{{$terapia->id}}" >De Baja</a>
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