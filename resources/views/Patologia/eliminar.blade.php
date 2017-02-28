@extends('layouts.app')

@section('content')

<div>

    <div class="alert alert-danger" role="alert">
            <h3>
                Desea eliminar la Patologia?
             </h3>

             <h4>{{$Patologia->Nombre}}</h4>
             
             <p>
                <form action="/Patologia/eliminar/{{$Patologia->id}}" method ="Post" role="form"  >
                {{ csrf_field()}}
                    <button type="submit" class="btn btn-danger">Elminar</button>
                    <a class= "btn btn-default" href="/Patologia/index"> Cancelar</a>
                </form>
             </p>
    </div>

</div>

@endsection