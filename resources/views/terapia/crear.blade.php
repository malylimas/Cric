@extends('layouts.app')

@section('content')

<form action= "crear" method="Post" role="form">
   {{ csrf_field()}}
  
  <div class="form-group">
    <label for="example-text-input">Nombre</label>
    <input type="text" class="form-control" name="Nombre" id="example-text-input">
  </div>
  <div class="form-group">
    <label for="example-text-input">Precio</label>
    <input type="number" class="form-control" name="Precio" id="example-text-input" min="0" max="999999999999.99" >
  </div>
  
  <button type="submit" class="btn btn-default">Guardar</button>
</form>


@endsection