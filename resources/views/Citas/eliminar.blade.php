@extends('layouts.app')

@section('content')

<div>

    <div class="alert alert-danger" role="alert">
            <h3>
                Desea eliminar la Cita?
             </h3>

             <h4>{{$cita->Nombre}}</h4>
             
             <p>
                <form action="/cita/eliminar/{{$cita->id}}" method ="Post" role="form"  >
                {{ csrf_field()}}
                    <button type="submit" class="btn btn-danger">Elminar</button>
                    <a class= "btn btn-default" href="/cita/index"> Cancelar</a>
                </form>
             </p>
    </div>

</div>

@endsection