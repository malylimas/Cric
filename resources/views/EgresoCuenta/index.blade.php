@extends('layouts.app')

@section('content')
<div>
    <div class ="row">
        <a class="btn btn-primary" href="egresocuentas/create" > crear EgresoCuenta</a>
    </div>
    </br>
    
    <div class = "row">
          <div class="contianer">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th><center><b>#</center></b></th>
                <th><center><b>Nombre</center></b></th>
                <th><center><b>Acciones</center></b></th>
              </tr>
            </thead>
            <tbody>
            @foreach ($cuenta_egresos as $cuenta_egreso)
              <tr>
                <th>{{ $cuenta_egreso->id }}</th>
                <td>{{ $cuenta_egreso->Nombre }}</td>
               
                
                <td>
                <center>
                  <div class="btn-group" role="group" aria-label="...">
                     <a type="button" class="btn btn-primary" href="/egresocuentas/{{$cuenta_egreso->id}}/edit">Modificar</a>
                     </center>
                </td>
              </tr>
              
              @endforeach
            </tbody>
          </table>
          </div>
          {{$cuenta_egresos->links()}}
    </div>
</div>
@endsection