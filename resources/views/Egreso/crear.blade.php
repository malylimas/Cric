@extends('layouts.form') @section('form-content') @define $pageTitle = 'Crear  Egreso'
<form action="/egreso/" method="post">

  <input type="hidden" name="modulo" value="{{$modulo}}">
{{ csrf_field()}}

  <div id="date-container" class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">Fecha</label>
    <div class="col-10">
      <input class="form-control" type="text" name="Fecha" id="example-text-input">
    </div>
  </div>

    @if ($modulo === 'banco')
  <div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">Numero Cheque</label>
    <div class="col-10">
      <input class="form-control" type="text" name="numero_cheque" id="example-text-input">
    </div>
  </div>
   @endif
  
   <div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">Beneficiario</label>
    <div class="col-10">
      <input class="form-control" type="text" name="beneficiario" id="example-text-input">
    </div>
  </div>



  <div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">Descripcion</label>
    <div class="col-10">
      <input class="form-control" type="text" name="Descripcion" id="example-text-input">
    </div>
  </div>

  <div class="form-group row">
    <label for="disabledSelect">Egreso</label>
    <select id="disabledSelect" name="cuenta_egreso_id" class="form-control">


        @foreach($cuentas as $cuenta)
          <option value="{{$cuenta->id}}"> {{$cuenta->Nombre}} </option>
        @endforeach
      </select>
  </div>


    <div class="form-group row ">

    <label for="example-text-input" class="col-2 col-form-label">Cantidad</label>
    <div class="col-10">
      <input class="form-control" type="number" placeholder="Ingrese Lps" name="Cantidad" id="example-text-input">

    </div>
  </div>


  <button type="submit" class="btn btn-primary">Guardar</button>
</form>


@endsection