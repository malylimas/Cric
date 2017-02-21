@extends('layouts.app')

@section('content')

<form action= "crear" method="Post" role="form">
   {{ csrf_field()}}

<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Nombre De Terapia</label>
  <div class="col-10">
    <input class="form-control" type="text" name="Nombre De Terapista"   id="example-text-input">
  </div>

<div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
</div>
</form

@endsection