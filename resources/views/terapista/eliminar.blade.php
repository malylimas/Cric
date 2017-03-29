@extends('layouts.app')

@section('content')

<div>

    <div class="alert alert-danger" role="alert">
            <h2>
               <center> ¿Desea dar de Baja al Terapista?<center>
             </h2>

            <center> <h4>{{$terapista->Nombre}}</h4><center>
             
             <p>
                <form action="/terapista/eliminar/{{$terapista->id}}" method ="Post" role="form"  >
                {{ csrf_field()}}
                    <button type="submit" class="btn btn-danger">De Baja</button>
                    <a class= "btn btn-default" href="/terapista/index"> Cancelar</a>
                </form>
             </p>
    </div>

</div>

@endsection