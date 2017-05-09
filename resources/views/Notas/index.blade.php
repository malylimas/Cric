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
            <table class="table table-responsive table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>

                        <th>
                            Grado
                        </th>

                            <th>
                                Cantidad de Alumnos
                            </th>

                            
                            <th>
                                Año
                            </th>
                         
                            <th>
                                Acciones
                            </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($cursos as $curso)
                    <tr>
                        <th>{{ $curso->id }}</th>
                        <th>{{ $curso->nombre}}</th>
                        <th>{{ $curso->cantidadAlumnos}}</th>
                        <th>{{ $curso->anio}}</th>
                      
                       <th>

                               <a  href="/notas/create?year={{$year}}&claseId={{$claseId}}&gradoId={{$curso->id}}">
                                  <i class="text-info material-icons">edit</i>
                               </a>

                       </th>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>


@endsection