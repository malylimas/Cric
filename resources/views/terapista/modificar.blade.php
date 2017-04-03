
@extends('layouts.form') 

@section('form-content')
    @define $pageTitle = 'Modificar Terapista'

<form action= "/terapista/modificar/{{$terapista->id}}" method="Post" role="form">
   {{ csrf_field()}}

<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Nombre</label>
  <div class="col-10">
    <input class="form-control" type="text" name="Nombre" value="{{ $terapista->Nombre}}"   id="example-text-input">
  </div>
</div>
<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Teléfono</label>
  <div class="col-10">
    <input class="form-control" type="text" name="Telefono" value = "{{$terapista->Telefono}}" id="example-text-input">
  </div>
</div>
<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Dirección</label>
  <div class="col-10">
    <input class="form-control" type="text"  value="{{$terapista->Direccion}}" name="Direccion" id="example-text-input">
  </div>
</div>
 

<div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
</div>
</form>



@endsection
