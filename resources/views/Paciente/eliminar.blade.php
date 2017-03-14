@extends('layouts.app')

@section('content')

<div>

    <div class="alert alert-danger" role="alert">
            <h3>
                Desea eliminar la Paciente?
             </h3>

             <h4>{{$paciente->Nombre_Paciente}}</h4>
             
             <p>
                <form action="/paciente/eliminar/{{$paciente->id}}" method ="Post" role="form"  >
                {{ csrf_field()}}
                    <button type="submit" class="btn btn-danger">Elminar</button>
                    <a class= "btn btn-default" href="/paciente/index"> Cancelar</a>
                </form>
             </p>
    </div>

</div>

@endsection