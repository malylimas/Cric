@extends('layouts.app')

@section('content')

<div>

    <div class="alert alert-danger" role="alert">
            <h3>
                Desea eliminar el Expediente?
             </h3>

             <h4>{{$expediente->Nombre_Paciente}}</h4>
             
             <p>
                <form action="/expediente/eliminar/{{$expediente->id}}" method ="Post" role="form"  >
                {{ csrf_field()}}
                    <button type="submit" class="btn btn-danger">Elminar</button>
                    <a class= "btn btn-default" href="/expediente/index"> Cancelar</a>
                </form>
             </p>
    </div>

</div>

@endsection