@extends('layouts.form') 

@section('form-content')
    @define $pageTitle = 'Crear Factura'
    @define
<form>
  
      <div class="form-group">
        <label for="example-text-input" class="col-2 col-form-label">Nombre del Paciente</label>
        <div class="col-10">
            <input class="form-control" id= "fechaPicker" name = "paciente" type="text" value="{{$paciente->Nombre_Paciente}}" disabled>
            
        </div>
    </div>       
    
      <div class="form-group ">
      
        <label for="example-text-input" class="col-2 col-form-label">Citas</label>
        <div class="col-10">
          <ul>
            @foreach($citas as $cita)

              <li> <span> {{ $cita->Fecha_Hora }} </span> <span> Lps {{$cita->patologia->terapia->Precio}}</span> </li>

            @endforeach
          </ul>
         
          
        </div>
      </div>

       <div class="form-group ">
      
        <label for="example-text-input" class="col-2 col-form-label">Precio</label>
        <div class="col-10">
          <input class="form-control" type="number" placeholder="Ingrese Lps" name="Precio" id="example-text-input" value="{{ $precio }}" >
         
          
        </div>
      </div>

      
    <div class="form-group ">
      
        <label for="example-text-input" class="col-2 col-form-label">SubTotal</label>
        <div class="col-10">
          <input class="form-control" type="number" placeholder="Ingrese Lps" name="SubTotal" id="example-text-input">

          
         </div>
      </div>

     <div class="form-group ">
      
        <label for="example-text-input" class="col-2 col-form-label">Total</label>
        <div class="col-10">
          <input class="form-control" type="number" placeholder="Ingrese Lps" name="Total" id="example-text-input">

          
         </div>
      </div>


    
    <button class= "btn btn-primary" type ="Submit" >Guardar</button>
</from>

@endsection