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
                    <label class="sr-only" for="exampleInputEmail3">Clase</label>
                    <select  name="claseId" class="form-control" value="{{$claseId}}">
                     @foreach ($clases as $c)
                        <option value="{{ $c->id }}" {{ $c->id == $claseId ? 'selected':'' }} >  {{$c->nombre}}</option>
                     @endforeach
                    </select>
                </div>

                <button class="btn btn-primary"> Buscar</button>
            </form>
        </div>
    </div>
    </br>
    @if($clase)
        <div class="row">
            <h3>Clase seleccionada: {{$clase->nombre}}</h3>
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
                      
                       <th><center><a class="btn btn-primary" href="/notas/create?year={{$year}}&claseId={{$claseId}}&gradoId={{$curso->id}}">Ingresar Notas</a></center></th>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>


@endsection