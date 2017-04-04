
@extends('layouts.app')

@section('content')
<div>
    <div class ="row">
        <a class="btn btn-primary" href="crear" > Crear Terapia</a>
    </div>
    </br>
    
    <div class = "row">
          <div class="contianer">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th><center><b>#</center></b></th>
                <th><center><b>Nombre</center></b></th>
                <th><center><b>Precio</center></b></th>
                <th><center><b>Acciones</center></b></th>
              </tr>
            </thead>
            <tbody>
            @foreach ($terapias as $terapia)
              <tr>
                <th>{{ $terapia->id }}</th>
                <td>{{ $terapia->Nombre }}</td>
                <td>{{ $terapia->Precio }}</td>
                
                <td>
                <center>
                  <div class="btn-group" role="group" aria-label="...">
                     <a type="button" class="btn btn-primary" href="modificar/{{$terapia->id}}">Modificar</a>
                     </center>
                </td>
              </tr>
              
              @endforeach
            </tbody>
          </table>
          </div>
       {{ $terapias->links() }}
    </div>
</div>
@endsection