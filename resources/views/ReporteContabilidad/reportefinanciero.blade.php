@extends('layouts.otro') @section('form-content') @define $pageTitle = 'Reporte Finaciero'


<div class="row">
  <div class="page-header">
    <center>
      <h1>Fundación Centro de Rehabilitación Integral De Comayagua (CRIC)</h1>
      <h3> Dr Marcial Ponce Ochoa</h3>
  </div>
  <center>
    <form class="form-inline" action="">
      <div class="form-group">
        <label for="exampleInputName2">Año</label>
        <input type="number" class="form-control" id="exampleInputName2" name="year" value="{{$year}}">
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
        <h2>INFORME FINANCIERO DE INGRESOS Y EGRESOS AÑO {{$year}}</h2>
      </div>
      <div class="row">
        <table class="table table-bordered" <thead>
          <tr>
            <th>Detalle</th>
            <th>Enero</th>
            <th>Febrero</th>
            <th>Marzo</th>
            <th>Abril</th>
            <th>Mayo</th>
            <th>Junio</th>
            <th>Julio</th>
            <th>Agosto</th>
            <th>Septiembre</th>
            <th>Octubre</th>
            <th>Noviembre</th>
            <th>Diciembre</th>

          </tr>
          </thead>
          <tbody>
           <tr>
              <td colspan="13"><h4>Ingresos</h4></td>
            </tr>
            @foreach ($datosIngreso as $key =>$value)
            <tr>

              <td> {{ $value['cuenta'] }}</td>
              <td> {{ array_get($value,'M1', 0) }}</td>
              <td> {{ array_get($value,'M2', 0) }}</td>
              <td> {{ array_get($value,'M3', 0) }}</td>
              <td> {{ array_get($value,'M4', 0) }}</td>
              <td> {{ array_get($value,'M5', 0) }}</td>
              <td> {{ array_get($value,'M6', 0) }}</td>
              <td> {{ array_get($value,'M7', 0) }}</td>
              <td> {{ array_get($value,'M8', 0) }}</td>
              <td> {{ array_get($value,'M9', 0) }}</td>
              <td> {{ array_get($value,'M10', 0) }}</td>
              <td> {{ array_get($value,'M11', 0) }}</td>
              <td> {{ array_get($value,'M12', 0) }}</td>



            </tr>
            @endforeach
            <tr>
              <td> Totales</td>
              <td> {{ array_get($totalIngreso,'1', 0) }}</td>
              <td> {{ array_get($totalIngreso,'2', 0) }}</td>
              <td> {{ array_get($totalIngreso,'3', 0) }}</td>
              <td> {{ array_get($totalIngreso,'4', 0) }}</td>
              <td> {{ array_get($totalIngreso,'5', 0) }}</td>
              <td> {{ array_get($totalIngreso,'6', 0) }}</td>
              <td> {{ array_get($totalIngreso,'7', 0) }}</td>
              <td> {{ array_get($totalIngreso,'8', 0) }}</td>
              <td> {{ array_get($totalIngreso,'9', 0) }}</td>
              <td> {{ array_get($totalIngreso,'10', 0) }}</td>
              <td> {{ array_get($totalIngreso,'11', 0) }}</td>
              <td> {{ array_get($totalIngreso,'12', 0) }}</td>

            </tr>



            <tr>
              <td colspan="13"><h4>Egresos</h4></td>
            </tr>
            @foreach ($datosEgreso as $key =>$value)
            <tr>

              <td> {{ $value['cuenta'] }}</td>
              <td> {{ array_get($value,'M1', 0) }}</td>
              <td> {{ array_get($value,'M2', 0) }}</td>
              <td> {{ array_get($value,'M3', 0) }}</td>
              <td> {{ array_get($value,'M4', 0) }}</td>
              <td> {{ array_get($value,'M5', 0) }}</td>
              <td> {{ array_get($value,'M6', 0) }}</td>
              <td> {{ array_get($value,'M7', 0) }}</td>
              <td> {{ array_get($value,'M8', 0) }}</td>
              <td> {{ array_get($value,'M9', 0) }}</td>
              <td> {{ array_get($value,'M10', 0) }}</td>
              <td> {{ array_get($value,'M11', 0) }}</td>
              <td> {{ array_get($value,'M12', 0) }}</td>



            </tr>
            @endforeach
            <tr>
              <td> Totales</td>
              <td> {{ array_get($totalEgreso,'1', 0) }}</td>
              <td> {{ array_get($totalEgreso,'2', 0) }}</td>
              <td> {{ array_get($totalEgreso,'3', 0) }}</td>
              <td> {{ array_get($totalEgreso,'4', 0) }}</td>
              <td> {{ array_get($totalEgreso,'5', 0) }}</td>
              <td> {{ array_get($totalEgreso,'6', 0) }}</td>
              <td> {{ array_get($totalEgreso,'7', 0) }}</td>
              <td> {{ array_get($totalEgreso,'8', 0) }}</td>
              <td> {{ array_get($totalEgreso,'9', 0) }}</td>
              <td> {{ array_get($totalEgreso,'10', 0) }}</td>
              <td> {{ array_get($totalEgreso,'11', 0) }}</td>
              <td> {{ array_get($totalEgreso,'12', 0) }}</td>

            </tr>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection