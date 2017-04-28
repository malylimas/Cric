@extends('layouts.form') @section('form-content') @define $pageTitle = 'Crear Ingreso Cuenta'
<form action="/ingresocuentas" method="Post" role="form">
      {{ csrf_field() }}

    <div class="form-group">
        <label for="example-text-input" class="col-2 col-form-label">Nombre </label>
        <div class="col-10">
            <input class="form-control" id="fechaPicker" name="Nombre" type="text" >

        </div>
    </div>

    <button class="btn btn-primary" type="Submit">Guardar</button>
</from>


    @endsection