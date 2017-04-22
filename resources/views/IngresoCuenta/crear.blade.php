@extends('layouts.form') 

@section('form-content')
    @define $pageTitle = 'Crear Egreso Cuenta'
    @define

     <form action="create" method="Post" role="form">
      
       <div class="form-group">
       <label for="example-text-input" class="col-2 col-form-label">Nombre </label>
        <div class="col-10">
        <input class="form-control" id= "fechaPicker" name = "Nombre" type="text"  disabled>
            
        </div>
    </div>       

    <button class= "btn btn-primary" type ="Submit" >Guardar</button>
</from>


@section