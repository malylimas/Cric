@extends('layouts.app') 
@section('content')
<div>
  <div class="row">
   
        <a class="btn btn-primary" href="egreso/create?modulo={{$modulo}}" > Crear  Egreso</a>
      
    </div>
  </div>
  </br>
  <div class="row">
    <div class="contianer">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>
              <center><b>#</center></b></th>
            <th>
              <center><b>Fecha</center></b></th>
            <th>
              <center><b>Cantidad</center></b></th>
            <th>
               <center><b>Descripcion</center></b></th>
            <th>
               <center><b>Cuenta Egreso</center></b></th>
        
              
          </tr>
        </thead>
        <tbody>
          @foreach ($egresos as $egreso)
          <tr>
            <th>{{ $egreso->id }}</th>
            <th>{{ $egreso->Fecha}}</th>
            <th>{{ $egreso->Cantidad}}</th>
            <th>{{ $egreso->Descripcion}}</th>
            <th>{{ $egreso->cuentaEgreso->Nombre}}</th>
         
           
           
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    {{$egresos->links()}}
  </div>
</div>

@endsection