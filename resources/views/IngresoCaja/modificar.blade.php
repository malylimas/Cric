@extends('layouts.form') 

@section('form-content')
    @define $pageTitle = 'Modificar Ingreso'
<form>
     
      <div class="form-group ">
         <label for="example-text-input" class="col-2 col-form-label">Nombre</label>
         <div class="col-10">
         <input class="form-control" type="text"  name="Nombre" id="example-text-input" >
         
        </div>
       </div>

      <div  class="form-group">
        <label for="fechaPicker" class="col-2 col-form-label">Fecha</label>
        <div class="col-10">
            <input class="form-control" id= "fechaPicker" name = "Fecha" type="datetime-local">
        </div>
       </div>


       <div class="form-group ">
      
        <label for="example-text-input" class="col-2 col-form-label">Descripcion</label>
        <div class="col-10">
          <input class="form-control" type="text"  name="Descripcion" id="example-text-input" >
         
        </div>
       </div>

 
        <button class= "btn btn-primary" type ="Submit" >Guardar</button>
    </from>
    
@endsection