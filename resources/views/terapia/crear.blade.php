

@extends('layouts.form') 

@section('form-content')
    @define $pageTitle = 'Crear Terapia'
    <form action="crear" method="Post" role="form" class= "" >
      {{ csrf_field() }}

      <div class="form-group ">
        <label for="nombretxt" class="">Nombre</label>
        <div class="col-10">
          <input class="form-control" type="text" name="Nombre" id="nombretxt" >
        </div>

      </div>

      <div class="form-group ">
      
        <label for="example-text-input" class="col-2 col-form-label">Precio</label>
        <div class="col-10">
          <input class="form-control" type="number" placeholder="Ingrese Lps" name="Precio" id="example-text-input" >
         
          
          
          
        </div>
      </div>

      

      <div class="form-group">
        <div class="">
          <button type="submit" class="btn btn-info">Guardar</button>
        </div>
      </div>

    </form>
@endsection

