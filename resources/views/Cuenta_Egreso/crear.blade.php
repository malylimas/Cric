@extends('layouts.form') 

@section('form-content')
    @define $pageTitle = 'Crear Cuenta Egreso'
<form>
     
      
       <div id="date-container" class="form-group row">
      <label for="example-text-input" class="col-2 col-form-label">Fecha</label>
       <div class="col-10">
      <input class="form-control" type="text" name="Fecha" id="example-text-input" >
      </div>
      </div>

       <div class="form-group ">
      
        <label for="example-text-input" class="col-2 col-form-label">Cantidad</label>
        <div class="col-10">
          <input class="form-control" type="number" placeholder="Ingrese Lps" name="Cantidad" id="example-text-input" >
          
        </div>
      </div>
    
        <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Descripcion</label>
        <div class="col-10">
        <input class="form-control" type="text" name="Descripcion" id="example-text-input" >
    </div>
  </div>

        <div class="form-group">
      <label for="disabledSelect">Egreso</label>
      <select id="disabledSelect" name="egreso" class="form-control">


        @foreach($egreso as $egreso)
          <option value="{{$egreso->id}}"> {{$egreso->Fecha}} </option>
        @endforeach
      </select>
      </div> 

  
     
         <button type="submit" class="btn btn-primary">Guardar</button>
</form>

        
@endsection


