@extends('layouts.app')

@section('content')
<div>
    <div class ="row">
        <a class="btn btn-primary" href="crear" > Crear Paciente</a>
    </div>
    <br>
     
     <div class="row">
      <a  class="btn btn-primary" href="pacientesatendidos/?fecha={{$var->format('d/m/Y')}}">Pacientes Atendidos</a>
     </div>
     </br>
    
    <div class = "row">
          <div class="contianer">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th><center><b>#</center></b></th>
                <th><center><b>Identidad</center></b></th>
                <th><center><b>Nombre Paciente</center></b></th>
                <th><center><b>Direccion Actual</center></b></th>
                <th><center><b>Fecha de Nacimiento</center></b></th>
                <th><center><b>Edad</center></b></th>
                <th><center><b>Teléfono</center></b></th>
                <th><center><b>Ocupación</center></b></th>
                <th><center><b>Nivel Educativo</center></b></th>
                <th><center><b>Departamento</center></b></th>
                <th><center><b>Municipio</center></b></th>
                <th><center><b>Acciones</center></b></th>
               
                
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
                <td>{{$paciente->departamento->Nombre_Departamento}}</td>
                <td>{{$paciente->municipio->Nombre_Municipio}}</td>
               
                <td>
                  <div class="btn-group" role="group" aria-label="...">
                    <a type="button" class="btn btn-primary" href="modificar/{{$paciente->id}}">Modificar</a>
                   
                </td>
                </tr>
              
              @endforeach
            </tbody>
          </table>
          </div>
       {{ $pacientes->links() }} 
    </div>
</div>
@endsection
 

