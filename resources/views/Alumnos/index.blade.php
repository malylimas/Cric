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
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                            <center><b>#</center></b></th>
                        <th>
                            <center><b>Identidad</center></b></th>
                        <th><center><b>Nombre</center></b></th>
                        <th><center><b>Telefono</center></b></th>
                        <th><center><b>Encargado</center></b></th>
                        <th><center><b>Departamento</center></b></th>
                        <th><center><b>Municipio</center></b></th>

                        <th>
                            <center><b>Acciones</center></b></th>

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
                            <center><a class="btn btn-primary" href="/alumnos/{{$alumno->id}}/edit">Modificar</a></center>
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