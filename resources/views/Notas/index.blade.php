@extends('layouts.app') 
@section('content')
<div>
    <div class="row">
        <div class="col-md-4">



                <a class="btn btn-primary" href="/matriculas/create"> Ingresar Notas</a>
           
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
                            <center><b>Alumno</center></b></th>

                            <th>
                            <center><b>Grado</center></b></th>

                            
                            <th>
                            <center><b>Año</center></b></th>

                            
                            <th>
                            <center><b>Fecha</center></b></th>

                            <th>
                            <center><b>Acciones</center></b></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($matriculas as $matricula)
                    <tr>
                        <th>{{ $matricula->id }}</th>
                        <th>{{ $matricula->alumno->nombre}}</th>
                        <th>{{ $matricula->grado->nombre}}</th>
                        <th>{{ $matricula->ano}}</th>
                        <th>{{ $matricula->fecha->format('d/m/Y')}}</th>
                        
                        <th><center><a class="btn btn-primary" href="/matriculas/{{$matricula->id}}/edit">Modificar</a></center></th>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $matriculas->links() }}
    </div>
</div>


@endsection