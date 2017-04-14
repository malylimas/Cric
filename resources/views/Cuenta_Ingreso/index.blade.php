@extends('layouts.app') 
@section('content')
<div>
  <div class="row">
    <div class="col-md-4">
      <form action="ingreso/create" method="GET" class="form-inline">
        <div class="form-group">
          <label class="sr-only" for="exampleInputEmail3">Nombre</label>
          <input type="text" required name="Nombre" class="form-control" id="exampleInputEmail3" >
        </div>
        <button class="btn btn-primary"> Crear Ingreso</button>
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
              <center><b>Nombre</center></b></th>
           
              <center><b>Acciones</center></b></th>
            <th>
              <center><b>Imprimir</center></b></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($CuentaIngreso as $CuentaIngreso)
          <tr>
            <th>{{ $CuentaIngreso->id }}</th>
            <th>{{ $CuentaIngreso->Nombre}}</th>
            
           
            
            <td>
              <center>
                <div class="btn-group" role="group" aria-label="...">
                  <a type="button" class="btn btn-primary" href="modificar/{{$ingreso->id}}">Modificar</a>
                </div>
              </center>
            </td>
            <td>
              <center>
                <div class="panel-heading">
                  <a href="/ingreso/imprimir/{{$ingreso->id}}"> <img src="/img/ImagenHTML2.jpg" border="0" width="30" height="30"></a>
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