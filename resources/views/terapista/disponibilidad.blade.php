@extends('layouts.app') @section('content')
<div>
  <div class="row">
    <div class="page-header">
      <h1 class="text-center">Disponibilidad</h1>
    </div>
    <form class="form-horizontal" action="/terapista/disponibilidad/{{$terapista->id}}">
      <label for="fechaDatos">Fecha</label>
      <div id="month-container">
        
        <div class="input-group date">
          <input id="fechaDatos" type="text" class="form-control" name="fechaMensual">
          <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>
      </div>

      <div id="date-container">       
        <div class="input-group date">
          <input id="fechaDatos" type="text" class="form-control" name="fechaDiaria">
          <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail2">Tipo</label>
        <select id="tipo" class="form-control" name="tipo" id="exampleInputEmail2">
                
                    <option value="m" >Mensual</option>
                    <option value="d">Diarios</option>
               
          </select>
      </div>
      <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
  </div>
  <div id="imprimirDatos">
    <div class="page-header">
      <h2>{{$terapista->Nombre}}</h2>
    </div>
    <div class="row">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre Paciente</th>
            <th>Patologia</th>
            <th>Fecha Hora</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($citas as $cita)
          <tr>
            <th>{{ $cita->id }}</th>
            <th>{{ $cita->paciente->Nombre_Paciente}}</th>
            <td>{{ $cita->Patologia->Nombre_Patologia}}</td>
            <td>{{ $cita->Fecha_Hora}}</td>
            <tr>
              @endforeach
        </tbody>
      </table>
    </div>
  </div>



  
  @endsection @section('script')
  <script>
    $(function () {

      $('#month-container .input-group.date').datepicker({
        format: "mm/yyyy",
        startView: 1,
        minViewMode: 1,
        language: "es"
      });

      $('#date-container .input-group.date').datepicker({

        language: "es"
      });
      $('#month-container .input-group.date').show();
      $('#date-container .input-group.date').hide();

      $('#tipo').change(function () {
        var value = $(this).val();
        if (value === 'd') {
          $('#month-container .input-group.date').hide();
          $('#date-container .input-group.date').show();
        } else {
          $('#month-container .input-group.date').show();
          $('#date-container .input-group.date').hide();
        }
      });

    });
  </script>
  @endsection