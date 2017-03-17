@extends('layouts.app')

@section('content')

<div>

    <div class="alert alert-danger" role="alert">
            <h3>
                Desea dar de Baja al Terapista?
             </h3>

             <h4>{{$terapista->Nombre}}</h4>
             
             <p>
                <form action="/terapista/eliminar/{{$terapista->id}}" method ="Post" role="form"  >
                {{ csrf_field()}}
                    <button type="submit" class="btn btn-danger">Elminar</button>
                    <a class= "btn btn-default" href="/terapista/index"> Cancelar</a>
                </form>
             </p>
    </div>

</div>

@endsection