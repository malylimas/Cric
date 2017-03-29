@extends('layouts.app')

@section('content')
<div>
    <div class ="row">
        <a class="btn btn-primary" href="crear" > Crear Patologia</a>
    </div>
    </br>
    
    <div class = "row">

          <table class="table table-bordered">
            <thead>
              <tr>
                <th><center><b>#</center></b></th>
                <th><center><b>Nombre De Patologia</center></b></th>
                <th><center><b>Tipo De Terapia</center></b></th>
                <th><center><b>Acciones</center></b></th>
              </tr>
            </thead>
            <tbody>
            @foreach ($patologias as $Patologia)
              <tr>
                <th>{{ $Patologia->id }}</th>
                <td>{{ $Patologia->Nombre_Patologia }}</td>
                <td>{{ $Patologia->terapia->Nombre}}</td>
                
                <td>
                <center>
                  <div class="btn-group" role="group" aria-label="...">
                     <a type="button" class="btn btn-primary" href="modificar/{{$Patologia->id}}">Modificar</a>
                     </center>

                </td>
              </tr>
              
              @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection