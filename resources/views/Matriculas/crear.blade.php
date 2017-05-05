@extends('layouts.form')

@section('form-content')
    @define $pageTitle = 'Crear Matricula'

    @if(is_null($alumno))
        <div class="alert alert-danger" role="alert">
            No hay registro del alumno
        </div>
    @else
        <form action="/matriculas" method="Post" role="form">
            {{ csrf_field()}}

            <div class="form-group row ">
                <label for="anioText" class="">Año</label>
                <div class="col-10">
                    <input class="form-control" id="anioText" name="ano" type="number">
                </div>

            </div>


            <div class="form-group row">
                <label for="dptoSelect">Alumno</label>
                <input id="dptoSelect"  class="form-control" disabled value="{{$alumno->nombre}}">
                <input id="alumnoId"  class="form-control" name="alumno_id"  type="hidden" value="{{$alumno->id}}">
            </div>

            <div class="form-group row">
                <label for="dptoSelect">Grado</label>
                <select id="dptoSelect" name="grado_id" class="form-control">

                    @foreach($grados as $grado)
                        <option value="{{$grado->id}}"> {{$grado->nombre}} </option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-primary" type="Submit">Guardar</button>
            </from>

    @endif
@endsection