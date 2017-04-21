@extends('layouts.form') @section('form-content') @define $pageTitle = 'Reporte De Banco'


<div class="row">
  <div class="page-header">
    <center>
      <h1>Fundación Centro de Rehabilitación Integral De Comayagua (CRIC)</h1>
      <h3> Dr Marcial Ponce Ochoa</h3>
  </div>
  <center>
    <form class="form-inline" action="">
      <div id="date-container" class="form-group">
        <label for="exampleInputName2">Fecha</label>
        <input type="text" class="form-control" id="exampleInputName2" name="fecha" value="{{$fecha}}">
      </div>
      
      <button type="submit" class="btn btn-primary">Buscar</button>
      <input type="button" name="imprimir" onclick="printDiv ('imprimirPacientes')" class="btn btn-default" id="ImprimirPaten"
        value="imprimir" />
    </form>
  </center>
  <br>
  <div id="imprimirPacientes">
    <div class="container-fluid">
      <div class="page-header">
        <h2>Movimiento Cuentas</h2>
      </div>
      <div class="row">
        <table class="table table-bordered"
          <thead>
            <tr>
              <th>Fecha</th>
              <th>Numero Chque</th>
              <th>Beneficiario</th>
              <th>Descripcion</th>
              <th>Deposito</th>
              <th>Valor Chque</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($cheques as $cheque)
            <tr>
              <th>{{ $cheque->fecha }}</th>
              <th>{{ $cheque->numero_cheque}}</th>
              <th>{{ $cheque->beneficiario}}</th>
              <td>{{ $cheque->descripcion}}</td>
              <td>{{ $cheque->deposito}}</td>
              <td>{{ $cheque->retiro}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
  @endsection