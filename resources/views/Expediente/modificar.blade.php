@extends('layouts.app')

@section('content')

<form action= "/expediente/modificar/{{$expediente->id}}" method="Post" role="form">
   {{ csrf_field()}}

<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Nombre Del Paciente</label>
  <div class="col-10">
    <input class="form-control" type="text" name="Nombre_Paciente" value="{{ $expediente->Nombre_Paciente}}"   id="example-text-input">
  </div>
</div>
<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Dirección</label>
  <div class="col-10">
    <input class="form-control" type="text" name="Direccion" value = "{{$expediente->Direccion}}" id="example-text-input">
  </div>
</div>

  <div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Observacion</label>
  <div class="col-10">
    <input class="form-control" type="text" name="Observacion" value = "{{$expediente->Observacion}}" id="example-text-input">
  </div>
</div>

  <div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Identidad</label>
  <div class="col-10">
    <input class="form-control" type="text" name="Identidad" value = "{{$expediente->Identidad}}" id="example-text-input">
  </div>
</div>

  <div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Telefono</label>
  <div class="col-10">
    <input class="form-control" type="text" name="Telefono" value = "{{$expediente->Telefono}}" id="example-text-input">
  </div>
</div>

<div class="form-group">
   <label for="disabledSelect">Sexo</label>
   <div class="col-10">
   <select id="disabledSelect" name="Sexo" class="form-control">
   <option>Femenino</option>
   <option>Masculino</option>
  </select>
  </div>
  </div>
 

<div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
</div>
</form



@endsection