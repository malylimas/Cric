@extends('layouts.app')

@section('content')

<div>

    <div class="alert alert-info" role="alert">

            <h3>
                Desea Habilitar un Terapia
             </h3>

             <h4>{{$terapia->Nombre}}</h4>
             
             <p>
                <form action="/terapia/habilitar/{{$terapia->id}}" method ="Post" role="form"  >
                {{ csrf_field()}}
                    <button type="submit" class="btn btn-primary">Habilitar</button>
                    <a class= "btn btn-default" href="/terapia/index"> Cancelar</a>
                </form>
             </p>
    </div>

</div>

@endsection