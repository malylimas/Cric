@extends('layouts.app')

@section('content')

<div>

    <div class="alert alert-info" role="alert">

            <h2>
               <center>¿ Desea activar  al  Terapista?<center>
             </h2>

           <center>  <h4>{{$terapista->Nombre}}</h4><center>
             
             <p>
                <form action="/terapista/habilitar/{{$terapista->id}}" method ="Post" role="form"  >
                {{ csrf_field()}}
                    <button type="submit" class="btn btn-primary">Activar</button>
                    <a class= "btn btn-default" href="/terapista/index"> Cancelar</a>
                </form>
             </p>
    </div>

</div>

@endsection