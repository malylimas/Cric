@extends('layouts.form') 

@section('form-content')
    @define $pageTitle = 'Crear Egreso Cuenta'
    @define

     <form action="create" method="Post" role="form">
      
       <div class="form-group ">
        <label for="nombretxt" class="">Nombre</label>
        <div class="col-10">
          <input class="form-control" type="text" name="Nombre" id="nombretxt"  >
        </div>

      </div>   

    <button class= "btn btn-primary" type ="Submit" >Guardar</button>
</from>


@endsection