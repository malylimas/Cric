@extends('layouts.app')

@section('content')

<form action= "/paciente/modificar/{{$expediente->id}}" method="Post" role="form">
   {{ csrf_field()}}


<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Identidad</label>
  <div class="col-10">
    <input class="form-control" type="text" name="Identidad" value = "{{$paciente->Identidad}}" id="example-text-input">
  </div>
</div>

<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Nombre Del Paciente</label>
  <div class="col-10">
    <input class="form-control" type="text" name="Nombre_Paciente" value="{{ $paciente->Nombre_Paciente}}"   id="example-text-input">
  </div>
</div>
<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Dirección_Actual</label>
  <div class="col-10">
    <input class="form-control" type="text" name="Direccion_Actual" value = "{{$paciente->Direccion_Actual}}" id="example-text-input">
  </div>
</div>

  <div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Fecha De Nacimiento</label>
  <div class="col-10">
    <input class="form-control" type="text" name="Fecha_Nacimiento" value = "{{$paciente->Fecha_Nacimineto}}" id="example-text-input">
  </div>
</div>

  <div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Edad</label>
  <div class="col-10">
    <input class="form-control" type="text" name="Edad" value = "{{$paciente->Edad}}" id="example-text-input">
  </div>
</div>

  <div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Telefono</label>
  <div class="col-10">
    <input class="form-control" type="text" name="Telefono" value = "{{$paciente->Telefono}}" id="example-text-input">
  </div>
</div>

 <div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Ocupacion</label>
  <div class="col-10">
    <input class="form-control" type="text" name="Ocupacion" value = "{{$paciente->Ocupacion}}" id="example-text-input">
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