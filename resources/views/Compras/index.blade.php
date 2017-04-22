@extends('layouts.app') 
@section('content')
<div>
  <div class="row">
    <div class="col-md-4">
      <form action="compra/create" method="GET" class="form-inline">
        
        <button class="btn btn-primary"> Crear Compras</button>
      </form>
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
              <center><b>Descripcion</center></b></th>
            <th>
              <center><b>Proveedores</center></b></th>
            <th>
              <center><b>Cantidad</center></b></th>
            <th>
              <center><b>NumeroFactura</center></b></th>
            
               
          </tr>
        </thead>
        <tbody>
          @foreach ($compras as $compra)
          <tr>
            <th>{{ $compra->id }}</th>
            <th>{{ $compra->Fecha}}</th>
            <th>{{ $compra->Descripcion}}</th>
            <td>{{ $compra->proveedores->Nombre}}</td>
            <td>{{ $compra->cantidad}}</td>
            <td>{{ $compra->NumeroFactura}}</td>
            
          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
      {{ $compras->links() }} 
    </div>
  </div>
</div>

@endsection