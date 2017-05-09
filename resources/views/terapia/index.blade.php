
@extends('layouts.app')

@section('content')
<div>
    <div class ="row">
        <a class="btn btn-primary" href="crear" > Crear Terapia</a>
    </div>
    </br>
    
    <div class = "row">
          <div class="contianer">
          <table class="table table-responsive">
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
                     <a  href="modificar/{{$terapia->id}}">
                         <i class="material-icons text-info" >edit</i>
                     </a>
                  </div>
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