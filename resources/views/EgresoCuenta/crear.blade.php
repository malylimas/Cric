@extends('layouts.form') 

@section('form-content')
    @define $pageTitle = 'Crear Egreso Cuenta'
    @define

     <form action="/egresocuenta" method="Post" role="form">
      {{ csrf_field()}}
       <div class="form-group ">
        <label for="nombretxt" class="">Nombre</label>
        <div class="col-10">
        <input class="form-control" id= "fechaPicker" name = "Nombre" type="text"  >
        </div>

      </div>   

    <button class= "btn btn-primary" type ="Submit" >Guardar</button>
</from>


@endsection