@extends('layouts.app')

@section('content')

<div>

    <div class="alert alert-info" role="alert">

            <h3>
                Desea Habilitar un Expediente
             </h3>

             <h4>{{$expediente->Nombre_Paciente}}</h4>
             
             <p>
                <form action="/expediente/habilitar/{{$expediente->id}}" method ="Post" role="form"  >
                {{ csrf_field()}}
                    <button type="submit" class="btn btn-primary">Habilitar</button>
                    <a class= "btn btn-default" href="/expediente/index"> Cancelar</a>
                </form>
             </p>
    </div>

</div>

@endsection