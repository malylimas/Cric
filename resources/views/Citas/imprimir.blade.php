@extends('layouts.app')

@section('content')
<input type = "button" onclick = "printDiv ('Imprimir')" value = "imprimir" />
<div id = "Imprimir">
      
 <body>
<div id="wrapper">
 <h1>Fundacion Centro De Rehabilitacion Integral De Comayagua (CRIC)</h1>
 <center>
 <h1> Dr Marcial Ponce Ochoa</h1>
 <h1> Tarjetas De Citas </h1>
 </center>
</div>

      
      <section style= Color:black; fond-size; 20px;>
       
       <h4>Area:{{$cita->patologia->terapia->Nombre}}</h4></h4>
       <br>
       <h4>#Expediente:</h4>
       <br>
       <h4>Nombre Px:{{$cita->paciente->Nombre_Paciente}}</h4>
       <br>
       <h4>Dirección:{{$cita->paciente->Direccion_Actual}}</h4>
       <br>
       <h4>Observaciónes:</h4>
       <br>
                  
      </section>
      
       <center>
      <section style= color: blue; fond-size; 10px;>
      <h5> Tels 2772-29-91, 2772-0459, 8869-0754 /9923-2369 E-mail: el_cric@yahoo.com.mx</h5>
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

