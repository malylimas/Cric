@extends('layouts.app')

@section('content')
<div>
    <div class ="row">
        <a class="btn btn-primary" href="ingresocuentas/create" > crear IngresoCuenta</a>
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
            @foreach ($cuenta_ingresos as $cuenta_ingreso)
              <tr>
                <th>{{ $cuenta_ingreso->id }}</th>
                <td>{{ $cuenta_ingreso->Nombre }}</td>
               
                
                <td>
                <center>
                  <div class="btn-group" role="group" aria-label="...">
                     <a type="button" class="btn btn-primary" href="ingresocuentas/{{$cuenta_ingreso->id}}/edit">Modificar</a>
                     </center>
                </td>
              </tr>
              
              @endforeach
            </tbody>
          </table>
          </div>
     {{ $cuenta_ingresos->links() }}
    </div>
</div>
@endsection