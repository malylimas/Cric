@extends('layouts.app') 
@section('content')
<div>
    <div class="row">
        <div >

            <form  method="GET" class="form-inline">
                <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail3">Año</label>
                    <input type="number" required name="year" class="form-control"  placeholder="Año" value="{{$year}}">
                </div>

                <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail3">Grado</label>
                    <select  name="gradoId" class="form-control" >
                     @foreach ($grados as $c)
                        <option value="{{ $c->id }}" {{ $c->id == $gradoId ? 'selected':'' }} >  {{$c->nombre}}</option>
                     @endforeach
                    </select>
                </div>

                <button class="btn btn-primary"> Buscar</button>
            </form>
        </div>
    </div>
    </br>
    @if($grado)
        <div class="row">
            <h3>Imprimir calificaciones de  {{$grado->nombre}}</h3>
        </div>
    @endif
    <div class="row">
        <div class="contianer">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                            <center><b>#</center></b></th>

                        <th>
                            <center><b>Nombre</center></b></th>                   
                         
                            <th>
                            <center><b>Acciones</center></b></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($matriculas as $matricula)
                    <tr>
                        <th>{{ $matricula->id }}</th>
                        <th>{{ $matricula->alumno->nombre}}</th>
                       
                      
                       <th><center><a class="btn btn-primary" href="/boletascalificaciones?matriculaId={{$matricula->id}}&alumnoId={{$matricula->alumno->id}}">Imprimir</a></center></th>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>


@endsection