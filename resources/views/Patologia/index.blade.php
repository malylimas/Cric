@extends('layouts.app')

@section('content')
<div>
    <div class ="row">
        <a class="btn btn-primary" href="crear" > Crear Patologia</a>
    </div>
    
    <div class = "row">

          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre De Patologia</th>
                <th>Tipo De Terapia</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($patologias as $Patologia)
              <tr>
                <th>{{ $Patologia->id }}</th>
                <td>{{ $Patologia->Nombre_Patologia }}</td>
                <td>{{ $Patologia->terapia->Nombre}}</td>
                
                <td>
                  <div class="btn-group" role="group" aria-label="...">
                     <a type="button" class="btn btn-primary" href="modificar/{{$Patologia->id}}">Modificar</a>
                     

                </td>
              </tr>
              
              @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection