@extends('layouts.app') 
@section('content')
<div>
  <div class="row">
    <div class="col-md-4">
      <a  class="btn btn-primary" href="ingreso/create?modulo={{$modulo}}">Crear Ingreso</a>
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
                <center><b>Cuenta de Ingreso</center></b></th>
               
          </tr>
        </thead>
       
        <tbody>
          @foreach ($ingresos as $ingreso)
          <tr>
            <th>{{ $ingreso->id }}</th>
            <th>{{ $ingreso->Fecha}}</th>
            <th>{{ $ingreso->Cantidad }}</th>
            <th>{{ $ingreso->Descripcion}}</th>
            <th>{{ $ingreso->cuentaIngreso->Nombre}}</th>
          </tr>
          @endforeach
       
        </tbody>
      
      </table>
    
    </div>
      {{ $ingresos->links() }} 
  </div>
</div>

@endsection