@extends('layouts.app')

@section('content')
<div>
    <div class ="row">
        <a class="btn btn-primary" href="crear" > Crear Patologia</a>
    </div>
    </br>
    
    <div class = "row">
          <div class="contianer">
          <table class="table table-responsive table-striped table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre De Patología</th>
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
                     <a href="modificar/{{$Patologia->id}}">
                         <i class="text-info material-icons">edit</i>
                     </a>
                  </div>

                </td>
              </tr>
              
              @endforeach
            </tbody>
          </table>
          </div>
       {{ $patologias->links() }} 
    </div>
</div>
@endsection