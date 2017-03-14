@extends('layouts.app')

@section('content')
<Input type = "button" onclick = "printDiv ('Imprimir')" value = "imprimir" />
<Div id = "Imprimir">
      
     <tilte>Fundacion Centro De Rehabilitacion Integral De Comayagua (CRIC)<title>
    <body>
      <H1> Area </h1>
      <H1> #Expediente </h1>
      <H1> Nombre Px </h1
      <H1> Dirección</h1
      <H1> Observación</h1


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

