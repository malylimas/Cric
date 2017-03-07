@extends('layouts.app')

@section('content')

<div>

    <div class="alert alert-info" role="alert">

            <h3>
                Desea Habilitar un Paciente
             </h3>

             <h4>{{$Paciente->Nombre_Paciente}}</h4>
             
             <p>
                <form action="/Paciente/habilitar/{{$Paciente->id}}" method ="Post" role="form"  >
                {{ csrf_field()}}
                    <button type="submit" class="btn btn-primary">Activar</button>
                    <a class= "btn btn-default" href="/Paciente/index"> Cancelar</a>
                </form>
             </p>
    </div>

</div>

@endsection