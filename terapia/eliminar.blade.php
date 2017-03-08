@extends('layouts.app')

@section('content')

<div>

    <div class="alert alert-danger" role="alert">
            <h3>
                Desea eliminar la terapia?
             </h3>

             <h4>{{$terapia->Nombre}}</h4>
             
             <p>
                <form action="/terapia/eliminar/{{$terapia->id}}" method ="Post" role="form"  >
                {{ csrf_field()}}
                    <button type="submit" class="btn btn-danger">Elminar</button>
                    <a class= "btn btn-default" href="/terapia/index"> Cancelar</a>
                </form>
             </p>
    </div>

</div>

@endsection