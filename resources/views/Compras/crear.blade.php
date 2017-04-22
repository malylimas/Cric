@extends('layouts.form') 

@section('form-content')
    @define $pageTitle = 'Crear Compras'
    @define

   <form action="/compra" method="post"> 
   {{ csrf_field()}}
      
      
      <div id="date-container" class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">Fecha</label>
    <div class="col-10">
      <input class="form-control" type="text" name="Fecha" id="example-text-input">
            
    </div>
</div>
  
 
    
     <div class="form-group ">
        <label for="nombretxt" class="">Descripcion</label>
        <div class="col-10">
          <input class="form-control" type="text" name="Descripcion" id="nombretxt"  >
        </div>
    </div>
     
    
     
    <div class="form-group ">
      
        <label for="example-text-input" class="col-2 col-form-label">Proveedores</label>
        <div class="col-10">
        <select id="selectProveedore" class="form-control" name="proveedore_id">
          
          @foreach($proveedore as $proveedore)
              <option value="{{$proveedore->id}}">{{$proveedore->Nombre}}</option>
          @endforeach

        </select>
          
        </div>
     </div>

       <div class="form-group ">
      
        <label for="example-text-input" class="col-2 col-form-label">Cantidad</label>
        <div class="col-10">
          <input class="form-control" type="number" placeholder="Ingrese Lps" name="cantidad" id="example-text-input" >
          
        </div>
      </div>

      
      
    <div class="form-group ">
      
        <label for="example-text-input" class="col-2 col-form-label">NumeroFactura</label>
        <div class="col-10">
         <input class="form-control" type="text" name="NumeroFactura" id="nombretxt"  > 
         </div>
     </div>


    
    <button class= "btn btn-primary" type ="Submit" >Guardar</button>
</from>

@endsection
