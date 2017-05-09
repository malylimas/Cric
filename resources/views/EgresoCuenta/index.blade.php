@extends('layouts.app')

@section('content')
<div>
    <div class ="row">
        <a class="btn btn-primary" href="egresocuentas/create" > crear EgresoCuenta</a>
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
            @foreach ($cuenta_egresos as $cuenta_egreso)
              <tr>
                <th>{{ $cuenta_egreso->id }}</th>
                <td>{{ $cuenta_egreso->Nombre }}</td>
               
                
                <td>
                  <div class="btn-group" role="group" aria-label="Acciones">
                     <a  href="/egresocuentas/{{$cuenta_egreso->id}}/edit">
                         <i class="material-icons text-info">
                             edit
                         </i>
                     </a>
                  </div>
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