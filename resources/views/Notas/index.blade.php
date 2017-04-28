@extends('layouts.app') 
@section('content')
<div>
    <div class="row">
        <div class="col-md-4">



                <a class="btn btn-primary" href="/notas/create"> Ingresar Notas</a>
           
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
                            <center><b>Grado</center></b></th>

                            <th>
                            <center><b>Cantidad de Alumnos</center></b></th>

                            
                            <th>
                            <center><b>Año</center></b></th>                        
                         
                            <th>
                            <center><b>Acciones</center></b></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($cursos as $curso)
                    <tr>
                        <th>{{ $curso->id }}</th>
                        <th>{{ $curso->nombre}}</th>
                        <th>{{ $curso->cantidadAlumnos}}</th>
                        <th>{{ $curso->anio}}</th>
                      
                       <th><center><a class="btn btn-primary" href="/curso/{{$curso->id}}/edit">Ingresar Notas</a></center></th>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>


@endsection