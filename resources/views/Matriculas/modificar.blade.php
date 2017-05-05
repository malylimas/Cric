@extends('layouts.form') 

@section('form-content')
    @define $pageTitle = 'Modificar Matricula'
    <form action="/matriculas/{{$matricula->id}}" method="Post" role="form">
      {{ csrf_field()}}
           {{ method_field('PUT') }}
      
       <div class="form-group row ">
        <label for="anioText" class="">Año</label>
        <div class="col-10">
        <input class="form-control" id="anioText" name = "ano" type="number" value="{{$matricula->ano}}" >
        </div>

      </div>   

      
   
    <div class="form-group row">
    <label for="dptoSelect">Alumno</label>
    <input id="dptoSelect"  class="form-control" disabled value="{{$matricula->alumno->nombre}}"/>
    <input  name="alumno_id" type="hidden"   value="{{$matricula->alumno_id}}"/>

   </div>

   <div class="form-group row">
    <label for="dptoSelect">Grado</label>
    <select id="dptoSelect" name="grado_id" class="form-control">
    
     @foreach($grados as $grado)
       <option value="{{$grado->id}}" {{ $grado->id === $matricula->grado_id ? 'selected' : '' }} > {{$grado->nombre}} </option>
     @endforeach
      </select>
   </div>

    <button class= "btn btn-primary" type ="Submit" >Guardar</button>
</from>



@endsection