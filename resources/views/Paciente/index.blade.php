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
          <table class="table table-responsive table-striped table-hover ">
            <thead>
              <tr>
                <th>#</th>
                <th>Identidad</th>
                <th>Nombre Paciente</th>
                <th>Direccion Actual</th>
                <th>Fecha de Nacimiento</th>
                <th>Edad</th>
                <th>Teléfono</th>
                <th>Ocupación</th>
                <th>Nivel Educativo</th>
                <th>Departamento</th>
                <th>Municipio</th>
                <th>Acciones</th>
               
                
              </tr>
            </thead>
            <tbody>
            @foreach ($pacientes as $paciente)
              <tr>

                <th >{{ $paciente->id }}</th>
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
                    <a  href="modificar/{{$paciente->id}}">
                        <i class="material-icons text-info">edit</i>
                    </a>
                  </div>
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