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
              <center><b>NumeroFactura</center></b></th>
            <th>
               <center><b>Imprimir</center></b></th>
               
          </tr>
        </thead>
        <tbody>
          @foreach ($compra as $compra)
          <tr>
            <th>{{ $compra->id }}</th>
            <th>{{ $compra->Fecha}}</th>
            <th>{{ $compra->Descripcion}}</th>
            <td>{{ $compra->proveedore->provedore_id}}</td>
            <td>{{ $compra->NumeroFactura}}</td>
            <td>
              <center>
                <div class="btn-group" role="group" aria-label="...">
                  <a type="button" class="btn btn-primary" href="modificar/{{$compra->id}}">Modificar</a>
                </div>
              </center>
            </td>
            <td>
              <center>
                <div class="panel-heading">
                  <a href="/compra/imprimir/{{$compra->id}}"> <img src="/img/ImagenHTML2.jpg" border="0" width="30" height="30"></a>
                </div>
              </center>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
      {{ $compra->links() }} 
    </div>
  </div>
</div>

@endsection