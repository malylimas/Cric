@extends('layouts.app') 
@section('content')
<div>
    <div class="row">
        <div class="col-md-4">



            <a class="btn btn-primary" href="/alumnos/create"> Crear Alumno</a>

        </div>
    </div>
    </br>
    <div class="row">
        <div class="contianer">
            <table class="table table-responsive table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Identidad
                        </th>
                            Nombre
                        </th>
                        <th>
                            Telefono
                        </th>
                            Encargado
                        </th>
                            Departamento
                        </th>
                            Municipio
                        </th>

                        <th>
                            Acciones
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($alumnos as $alumno)
                    <tr>
                        <th>{{ $alumno->id }}</th>
                        <th>{{ $alumno->identidad}}</th>
                        <th>{{ $alumno->nombre}}</th>
                        <th>{{ $alumno->telefono}}</th>
                        <th>{{ $alumno->nombreEncargado}}</th>
                        <th>{{ $alumno->departamento->Nombre_Departamento}}</th>
                        <th>{{ $alumno->municipio->Nombre_Municipio}}</th>

                        <th>
                            <a  href="/alumnos/{{$alumno->id}}/edit">
                                <i class="material-icons text-info">edit</i>
                            </a>
                        </th>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $alumnos->links() }}
    </div>
</div>


@endsection