
@extends('layouts.form') 

@section('form-content')
    @define $pageTitle = 'Crear Matricula'
    

     <form action="/matriculas" method="Post" role="form">
      {{ csrf_field()}}
      
       <div class="form-group row ">
        <label for="anioText" class="">Año</label>
        <div class="col-10">
        <input class="form-control" id="anioText" name = "ano" type="number"  >
        </div>

      </div>   

      
   
    <div class="form-group row">
    <label for="dptoSelect">Alumno</label>
    <select id="dptoSelect" name="alumno_id" class="form-control">
    
     @foreach($alumnos as $alumno)
       <option value="{{$alumno->id}}"> {{$alumno->nombre}} </option>
     @endforeach
      </select>
   </div>

   <div class="form-group row">
    <label for="dptoSelect">Grado</label>
    <select id="dptoSelect" name="grado_id" class="form-control">
    
     @foreach($grados as $grado)
       <option value="{{$grado->id}}"> {{$grado->nombre}} </option>
     @endforeach
      </select>
   </div>

    <button class= "btn btn-primary" type ="Submit" >Guardar</button>
</from>


@endsection