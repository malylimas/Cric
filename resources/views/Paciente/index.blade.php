@extends('layouts.app')

@section('content')
<div>
    <div class ="row">
        <a class="btn btn-primary" href="crear" > Crear Paciente</a>
    </div>
    <br>
     
     <div class="row">
      <a  class="btn btn-primary" href="pacientesatendidos/?tipo=m&fecha={{$var}}">Pacientes Atendidos</a>
     </div>
    
    <div class = "row">

          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Identidad</th>
                <th>Nombre Paciente</th>
                <th>Direccion Actual</th>
                <th>Fecha De Nacimiento</th>
                <th>Edad</th>
                <th>Telefono</th>
                <th>Ocupacion</th>
                <th>Nivel Educativo</th>
                <th>Municipio</th>
                <th>Departamento</th>
                <th>Acciones</th>
               
                
              </tr>
            </thead>
            <tbody>
            @foreach ($pacientes as $paciente)
              <tr>

                <th scope="row">{{ $paciente->id }}</th>
                <td>{{ $paciente->Identidad }}</td>
                <td>{{ $paciente->Nombre_Paciente }}</td>
                <td>{{ $paciente->Direccion_Actual }}</td>
                <td>{{ $paciente->Fecha_Nacimiento }}</td>
                <td>{{ $paciente->Edad}}</td>
                <td>{{ $paciente->Telefono}}</td>
                <td>{{ $paciente->Ocupacion}}</td>
                <td>{{ $paciente->nivel->Descripcion}}</td>
                <td>{{$paciente->municipio->Nombre_Municipio}}</td>
                <td>{{$paciente->departamento->Nombre_Departamento}}</td>
                <td>
                  <div class="btn-group" role="group" aria-label="...">
                    <a type="button" class="btn btn-primary" href="modificar/{{$paciente->id}}">Modificar</a>
                   
                </td>
                </tr>
              
              @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection
 

