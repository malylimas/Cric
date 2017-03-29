@extends('layouts.form') @section('form-content') @define $pageTitle = 'Disponibilidad'


<div>
  <div>
    <div class="page-header">
      <h1 class="text-center">Disponibilidad</h1>
    </div>
    <form  action="/terapista/disponibilidad/{{$terapista->id}}">
      <div class="form-group col-md-4">
        <label for="fechaDatos">Fecha</label>

        <div id="month-container">

          <div class="input-group date">
            <input id="fechaDatos" type="text" class="form-control" name="fechaMensual" value="{{$fechaMensual}}" >
            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
          </div>
        </div>

        <div id="date-container">
          <div class="input-group date">
            <input id="fechaDatos" type="text" class="form-control" name="fechaDiaria"value="{{$fechaDiaria}}" >
            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-4" >
          <label for="exampleInputEmail2">Tipo</label>
          <select id="tipo" class="form-control" name="tipo" id="exampleInputEmail2">
                
                @if($tipo == 'm' )
                <option value="m" selected>Mensual</option>
                    <option value="d">Diarios</option>
                @else
                  <option value="m" >Mensual</option>
                    <option value="d" selected>Diarios</option>
                @endif 
                    
               
          </select>
        </div>
      </div>
      <button type="submit" class="btn btn-primary btn-lg active">Buscar</button>
      <button type="button" name="imprimir" class="btn btn-default btn-lg active" id="ImprimirPac" onClick="printDiv('imprimirDatos')"
        value="Imprimir">Imprimir</button>
    </form>
  </div>
  <div id="imprimirDatos">
    <div class="page-header">
      <p class="lead">{{$terapista->Nombre}}</p>
    </div>

    <div class="row">
      <table class="table table-bordered">
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
      @if($tipo == 'm' )
        $('#month-container .input-group.date').show();
        $('#date-container .input-group.date').hide();
      @else
        $('#month-container .input-group.date').hide();
        $('#date-container .input-group.date').show();
      @endif 
      $('#month-container .input-group.date').datepicker({
        format: "mm/yyyy",
        startView: 1,
        minViewMode: 1,
        language: "es"
      });

      $('#date-container .input-group.date').datepicker({

        language: "es"
      });
    

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