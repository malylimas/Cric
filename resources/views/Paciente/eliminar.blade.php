@extends('layouts.app')

@section('content')

<div>

    <div class="alert alert-danger" role="alert">
            <h3>
                Desea eliminar el Paciente?
             </h3>

             <h4>{{$Paciente->Nombre_Paciente}}</h4>
             
             <p>
                <form action="/Paciente/eliminar/{{$Paciente->id}}" method ="Post" role="form"  >
                {{ csrf_field()}}
                    <button type="submit" class="btn btn-danger">Elminar</button>
                    <a class= "btn btn-default" href="/Paciente/index"> Cancelar</a>
                </form>
             </p>
    </div>

</div>

@endsection