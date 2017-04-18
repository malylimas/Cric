@extends('layouts.form') 

@section('form-content')
    @define $pageTitle = 'Crear Cuenta Ingreso'
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
      <label for="disabledSelect">Cuenta_Ingreso_id</label>
      <select id="disabledSelect" name="Cuenta_Ingreso_id" class="form-control">
        
        @foreach($Cuenta_Ingreso_id as $cuenta_ingreso_id)
          <option value="{{$cuenta_ingreso->id}}"> {{$cuenta_ingreso->Fecha}} </option>
        @endforeach
      </select>
      </div> 
  
      <button type="submit" class="btn btn-primary">Guardar</button>
</form>
    
      
 
     
    
@endsection