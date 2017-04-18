@extends('layouts.app') 
@section('content')
<div>
  <div class="row">
   
        <button class="btn btn-primary"> Crear Cuenta Egreso</button>
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
              <center><b>Cantidad</center></b></th>
            <th>
               <center><b>Descripcion</center></b></th>
            <th>
               <center><b>cuenta_Egreso</center></b></th>
            <th> 
              <center><b>Imprimir</center></b></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($CuentaEgreso as $CuentaEgreso)
          <tr>
            <th>{{ $Egreso->id }}</th>
            <th>{{ $Egreso->Fecha}}</th>
            <th>{{ $Egreso->Cantidad}}</th>
            <th>{{ $Egreso->Descripcion}}</th
            <th>{{ $Egreso->cuenta_Egreo}}</th
         
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