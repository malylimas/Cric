@extends('layouts.form') 

@section('form-content')
    @define $pageTitle = 'Crear Factura'
    @define
<form action="/factura?" method="post"> 
   {{ csrf_field()}}
      <input name="paciente_id"  type="hidden" value= "{{$paciente->id}}"/>
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
                <input name="cita_id"  type="hidden" value= "{{$cita->id}}"/>
            @endforeach
          </ul>
         
          
        </div>
      </div>

      
    <div class="form-group ">
      
        <label for="example-text-input" class="col-2 col-form-label">SubTotal</label>
        <div class="col-10">
          <input id="subTotal" class="form-control" type="number" placeholder="Ingrese Lps" name="SubTotal" id="example-text-input" value= "{{$subTotal}}">

          
         </div>
      </div>


     
     <div class="form-group ">
      
        <label for="example-text-input" class="col-2 col-form-label">Descuento</label>
        <div class="col-10">
        <select id="selectDescuentos" class="form-control">
          <option value="0">Ninguno</option>
          <option value="25">Descuento Tercera Edad</option>
          <option value="100">Descuento Escasos Recursos</option>
          <option value="25">Descuento por Discapacidad</option>
          
        </select>
          
         </div>
      </div>



     <div class="form-group ">
      
        <label for="example-text-input" class="col-2 col-form-label">Total</label>
        <div class="col-10">
          <input id="total" class="form-control" type="number" placeholder="Ingrese Lps" name="Total" id="example-text-input" value="{{$subTotal}}">

          
         </div>
      </div>


    
    <button class= "btn btn-primary" type ="Submit" >Guardar</button>
</from>

@endsection
@section('script')
<script>
  var element =  $('#selectDescuentos');
  var subElement = $('#subTotal');
  var tottal = $('#total');
  element.on('change', function(){
    var value =this.value;
    var sub = parseInt(subElement.val());
    var result = (parseInt(value)/100) * sub;

    tottal.val (sub -result) 
  });
</script>
@endsection