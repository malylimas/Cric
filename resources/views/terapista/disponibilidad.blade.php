@extends('layouts.app') @section('content')
<div>
  <div class="row">
    <div class="page-header">
      <h1 class="text-center">Disponibilidad</h1>
    </div>
    <form class="form-inline" action="/terapista/disponibilidad/{{$terapista->id}}">
      <div class="form-group">
        <label for="exampleInputName2">Fecha</label>
        <input type="date" class="form-control" id="exampleInputName2" name="fecha" placeholder="Jane Doe" value="{{$fecha}}">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail2">Tipo</label>
        <select class="form-control" name="tipo" id="exampleInputEmail2">
                
                    <option value="m" >Mensual</option>
                    <option value="d">Diarios</option>
               
      </select>
      </div>
      <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

  </div>
<br>
  <div class="row">
  <div class="col-xs-12 col-sm-6 col-md-8"><img src="/img/ImagenHTML2.jpg" border="0" width="40" height="30"> </div>
   <button type="button"class="btn btn-info">Imprimir</button>
  </div>
  
  <script>
    function printDiv(divName) {
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
    }
  </script>


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

@endsection