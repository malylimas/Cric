@extends('layouts.app') 
@section('content')
<div>
  <div class="row">
    <div class="col-md-4">
      <form action="egreso/create" method="GET" class="form-inline">
        <div class="form-group">
          <label class="sr-only" for="exampleInputEmail3">Numero de Cheque</label>
          <input type="text" required name="Numero_Cheque" class="form-control" id="exampleInputEmail3" placeholder="Numero del Cheque">
        </div>
        <button class="btn btn-primary"> Crear egreso</button>
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
              <center><b>Numero_Cheque</center></b></th>
            <th>
              <center><b>Fecha</center></b></th>
            <th>
              <center><b>Cantidad</center></b></th>
            <th>
              <center><b>Descripcion</center></b></th>
            <th>
              <center><b>Beneficiario</center></b></th>
            <th>
              <center><b>Acciones</center></b></th>
            <th>
              <center><b>Imprimir</center></b></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($egresos as $egreso)
          <tr>
            <th>{{ $egreso->id }}</th>
            <th>{{ $egreso->Numero_Cheque}}</th>
            <th>{{ $egreso->Fecha}}</th>
            <td>{{ $egreso->Cantidad}}</td>
            <td>{{ $egreso->Descripcion}}</td>
            <td>{{ $egreso->Beneficiario}}</td>
            
            <td>
              <center>
                <div class="btn-group" role="group" aria-label="...">
                  <a type="button" class="btn btn-primary" href="modificar/{{$egreso->id}}">Modificar</a>
                </div>
              </center>
            </td>
            <td>
              <center>
                <div class="panel-heading">
                  <a href="/egreso/imprimir/{{$egreso->id}}"> <img src="/img/ImagenHTML2.jpg" border="0" width="30" height="30"></a>
                </div>
              </center>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection