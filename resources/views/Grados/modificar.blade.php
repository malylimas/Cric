@extends('layouts.form') 

@section('form-content')
    @define $pageTitle = 'Modificar Grados'
    <form action="/grados/{{$grado->id}}" method="Post" role="form" class= "" >
      {{ csrf_field() }}
      {{ method_field('PUT') }}


      <div class="form-group ">
        <label for="nombretxt" class="">Nombre</label>
        <div class="col-10">
          <input class="form-control" type="text" name="nombre" id="nombretxt" value="{{$grado->nombre}}" >
        </div>

      </div>


      <div class="form-group">
        <div class="">
          <button type="submit" class="btn btn-info">Guardar</button>
        </div>
      </div>

    </form>


@endsection