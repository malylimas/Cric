@extends('layouts.app')

@section('content')

<div>

    <div class="alert alert-info" role="alert">

            <h3>
                Desea Habilitar una Cita
             </h3>

             <h4>{{$cita->Nombre}}</h4>
             
             <p>
                <form action="/cita/habilitar/{{$cita->id}}" method ="Post" role="form"  >
                {{ csrf_field()}}
                    <button type="submit" class="btn btn-primary">Habilitar</button>
                    <a class= "btn btn-default" href="/cita/index"> Cancelar</a>
                </form>
             </p>
    </div>

</div>

@endsection