@extends('layouts.app') @section('content')
<div>
  <div class="row">
    <div class="page-header">
      <h1 class="text-center">Reporte de ReIngresos y Nuevos</h1>
    </div>
    <form class="form-inline" action="">
      <div class="form-group">
        <label for="exampleInputName2">Fecha</label>
        <input type="date" class="form-control" id="exampleInputName2" name="fecha" placeholder="Jane Doe" value="">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail2">Tipo</label>
        <select class="form-control" name="tipo" id="exampleInputEmail2">
                
                    <option value="m" >Reingresos</option>
                    <option value="d">Nuevos</option>
               
      </select>

      <button type="submit" class="btn btn-primary">Buscar</button>
     </form>
    </div>

  <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-8"><img src="/img/ImagenHTML2.jpg" border="0" width="40" height="30"></div>
    <input name="imprimir" type="button" id="ImprimirPac" onClick="printDiv('imprimirPacientes')" value="Imprimir">
  </div>


  <div id="imprimirPacientes">
    <div class="page-header">  
    </div>
    <div class="row">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre Paciente</th>
            <th>Patologia</th>
            <th>Fecha Hora</th>
            <th>Terapista</th>
          </tr>
        </thead>
        <tbody>
       
          <tr>

     
            <tr>


        </tbody>
      </table>

    </div>
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
  @endsection