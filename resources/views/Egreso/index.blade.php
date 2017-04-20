@extends('layouts.app') 
@section('content')
<div>
  <div class="row">
   
        <a class="btn btn-primary" href="egreso/create?modulo={{$modulo}}" > Crear  Egreso</a>
    </div>
  </div>
  </br>
  <div class="row">
    <div class="contianer"><table class="table table-bordered">
        <thead>
          <tr>
            <th>
              <center><b>#</center></b></th>
            <th>
              <center><b>Fecha</center></b></th>
            <th>
              <center><b>Beneficiario</center></b></th>
              <th>
               <center><b>Descripcion</center></b></th>
            <th>
               <center><b>Cantidad</center></b></th>
               @if ($modulo === 'banco')
               <th>
               <center><b>Numero Cheque</center></b></th>
               @endif

            <th>
               <center><b>Cuenta Egreso</center></b></th>
             
              
          </tr>
        </thead>
        <tbody>
          @foreach ($egresos as $egreso)
          <tr>
            <th>{{ $egreso->id }}</th>
            <th>{{ $egreso->Fecha}}</th>
            <th>{{ $egreso->beneficiario}}</th>
            <th>{{ $egreso->Descripcion}}</th>
            <th>{{ $egreso->Cantidad}}</th>
            
             @if ($modulo === 'banco')
               <th>{{ $egreso->numero_cheque}}</th>
            @endif
            
            <th>{{ $egreso->cuentaEgreso->Nombre}}</th>       
           

          @endforeach
        </tbody>
      </table>
    </div>
    {{$egresos->links()}}
  </div>
</div>

@endsection