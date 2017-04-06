@extends('layouts.form') 

@section('form-content')
    @define $pageTitle = 'Modificar Egreso'
<form>
     
      <div class="form-group ">
         <label for="example-text-input" class="col-2 col-form-label">Numero Cheque</label>
         <div class="col-10">
         <input class="form-control" type="text" placeholder="Ingrese Numero de Cheque" name="Numero_Cheque" id="example-text-input" >
         
        </div>
       </div>

      <div  class="form-group">
        <label for="fechaPicker" class="col-2 col-form-label">Fecha</label>
        <div class="col-10">
            <input class="form-control" id= "fechaPicker" name = "Fecha" type="datetime-local">
        </div>
       </div>


      <div class="form-group ">
      
        <label for="example-text-input" class="col-2 col-form-label">Cantidad</label>
        <div class="col-10">
          <input class="form-control" type="number" placeholder="Ingrese la cantidad" name="Cantidad" id="example-text-input" >
         
        </div>
       </div>

       <div class="form-group ">
      
        <label for="example-text-input" class="col-2 col-form-label">Descripcion</label>
        <div class="col-10">
          <input class="form-control" type="text"  name="Descripcion" id="example-text-input" >
         
        </div>
       </div>

        <div class="form-group ">
      
        <label for="example-text-input" class="col-2 col-form-label">Beneficiario</label>
        <div class="col-10">
          <input class="form-control" type="text"  name="Beneficiario" id="example-text-input" >
         
        </div>
       </div>
   

 
        <button class= "btn btn-primary" type ="Submit" >Guardar</button>
    </from>
    
@endsection
