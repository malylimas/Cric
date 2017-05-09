@extends('layouts.form') @section('form-content') @define $pageTitle = 'Cuadro de Calificaciones'
<div class="row">
  <div class="page-header">
    <center>
      <h1>Fundación Centro de Rehabilitación Integral De Comayagua (CRIC)</h1>
      <h3> Dr Marcial Ponce Ochoa</h3>
  </div>

  <div> 
  <button name="imprimir" onclick="printDiv ('imprimirPacientes')" class="btn btn-default" id="ImprimirPaten" /> Imprimir</button>
 </div>
    
  <br>
  <div id="imprimirPacientes">
    <div class="container-fluid">
      <div class="page-header">
        <h2>Cuadro de Calificaciones</h2>
        <h3>Alumno: {{$alumno->nombre}}</h3>
      </div>
      <div class="row">
        <table class="table table-bordered">
          <thead>
            <tr>           
              <th>Clase</th>
              <th>Primer Parcial</th>
              <th>Segundo Parcial</th>
              <th>Tercer Parcial</th>
              <th>Cuarto Parcial</th>
              <th>Promedio</th>              
            </tr>
          </thead>
          <tbody>
            @foreach ($notas as $nota)
            <tr>
              
              <th>{{ $nota->clase->nombre}}</th>
              <th>{{ $nota->primerParcial}}</th>
              <th>{{ $nota->segundoParcial}}</th>
              <th>{{ $nota->tercerParcial}}</th>
              <th>{{ $nota->cuartoParcial}}</th>
              <th>{{ $nota->promedio}}</th>
         
             
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection