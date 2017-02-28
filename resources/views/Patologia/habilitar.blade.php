@extends('layouts.app')

@section('content')

<div>

    <div class="alert alert-info" role="alert">

            <h3>
                Desea Habilitar una Patologia
             </h3>

             <h4>{{$Patologia->Nombre}}</h4>
             
             <p>
                <form action="/Patologia/habilitar/{{$Patologia->id}}" method ="Post" role="form"  >
                {{ csrf_field()}}
                    <button type="submit" class="btn btn-primary">Habilitar</button>
                    <a class= "btn btn-default" href="/Patologia/index"> Cancelar</a>
                </form>
             </p>
    </div>

</div>

@endsection