@extends('layouts.app')

@section('content')

<div>

    <div class="alert alert-info" role="alert">

            <h3>
                Desea activar  al  Terapista
             </h3>

             <h4>{{$terapista->Nombre}}</h4>
             
             <p>
                <form action="/terapista/habilitar/{{$terapista->id}}" method ="Post" role="form"  >
                {{ csrf_field()}}
                    <button type="submit" class="btn btn-primary">Habilitar</button>
                    <a class= "btn btn-default" href="/terapista/index"> Cancelar</a>
                </form>
             </p>
    </div>

</div>

@endsection