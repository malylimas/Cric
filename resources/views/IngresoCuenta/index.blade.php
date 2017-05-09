@extends('layouts.app')

@section('content')
<div>
    <div class ="row">
        <a class="btn btn-primary" href="ingresocuentas/create" > crear IngresoCuenta</a>
    </div>
    </br>
    
    <div class = "row">
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
            @foreach ($cuenta_ingresos as $cuenta_ingreso)
              <tr>
                <th>{{ $cuenta_ingreso->id }}</th>
                <td>{{ $cuenta_ingreso->Nombre }}</td>
               
                
                <td>

                  <div class="btn-group" role="group" aria-label="...">
                     <a  href="ingresocuentas/{{$cuenta_ingreso->id}}/edit">
                         <i class="material-icons text-info">edit</i>
                     </a>
                  </div>
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