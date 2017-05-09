@extends('layouts.app') 
@section('content')
<div>
    <div class="row">
        <div class="col-md-8">
            <form action="/matriculas/create" class="form-inline">
                <div class="form-group">
                    <label for="exampleInputName2">Identidad</label>
                    <input type="text" name="identidad" class="form-control" id="exampleInputName2" placeholder="Identidad" required>
                </div>

                <button type="submit" class="btn btn-primary">Crear Matricula</button>
            </form>


           
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
                            Alumno
                        </th>

                            <th>
                                Grado
                            </th>

                            
                            <th>Año</th>

                            
                            <th>
                                Fecha
                            </th>

                            <th>
                                Acciones
                            </th>

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
                        
                        <th>

                                <a href="/matriculas/{{$matricula->id}}/edit">
                                    <i class="material-icons text-info">edit</i>
                                </a>

                        </th>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $matriculas->links() }}
    </div>
</div>


@endsection