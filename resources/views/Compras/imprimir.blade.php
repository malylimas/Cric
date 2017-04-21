@extends('layouts.form') @section('form-content') @define $pageTitle = 'Factura'

<input type = "button" name="imprimir" onclick = "printDiv ('Imprimir')"class="btn btn-default btn-lg active"id="ImprimirCita" value = "imprimir" />
<div id = "Imprimir">

 <br>
  <div id="wrapper">
  <center>
  <h1>Fundacion Centro De Rehabilitacion Integral De Comayagua (CRIC)</h1>
  <h3> Dr Marcial Ponce Ochoa</h3>
  
  </center>
  </div>

   <br>   
   <section style= Color:black; fond-size; 20px;>
       <center>
       <h5> Fecha: {{$compra->Fecha}}</h5>
       <br>
       <h5> Descripcion: {{$compra->Descripcion}} </h5>
       <br>
       <h5> Proveedor: {{$proveedore->porveedore_id}}</h5>
       <br> 
       <br>
       <h5> NumeroFactura:  {{$compra->NumeroFactura}}</h5>
       <br>
       
      </center>
                  
      </section>
      
       <center>
      <section style= color: blue; fond-size; 10px;>
      <h5> Tels 2772-29-91, 2772-0459, 8869-0754 /9923-2369 E-mail: el_cric@yahoo.com.mx</h4>
      <h5> Horario:Lunes a Viernes</h5>
      <h5> 7:10 a.m.-11:45 a.m.</h5>
      <h5> 1:15 a.m.-3:45 a.m.</h5> 
      </section>
      <center>
      
</div>


<script>
 function printDiv(divName) 
{
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
}
 </script>  

@endsection

