@extends('layouts.app')

@section('content')



<form action= "/cita/modificar/{{$cita->id}}" method="Post" role="form">
   {{ csrf_field()}}
  
  <div class="form-group">
    <label for="example-text-input">Nombre De Paciente</label>
    <input type="text" class="form-control" name= "Nombre_Paciente" id="example-text-input" value= "{{$cita->paciente->Nombre_Paciente}}">
      
  </div>


  <div class="form-group">
        <label for="example-text-input" class="col-2 col-form-label">Terapista</label>
        <div class="col-10">
            <select class="form-control"  name="terapista_id" value= "{{$cita->terapista_id}}" >
                @foreach ($terapistas as $terapista)
                    <option value="{{$terapista->id}}">{{$terapista->Nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>


   <div class="form-group">
        <label for="patologiaCombo" class="col-2 col-form-label">Patologia</label>
        <div class="col-10">
            <select class="form-control"  name="Patologia_id" id="PatologiaCombo" value="{{$cita->Nombre_Patologia}}" >
                @foreach ($patologias as $patologia)
                    <option value="{{$patologia->id}}">{{$patologia->Nombre_Patologia}}</option>
                @endforeach
            </select>
        </div>

    

    <div class="form-group">
        <label for="fechaPicker" class="col-2 col-form-label">Fecha Hora</label>
        <div class="col-10">
            <input class="form-control" id= "fechaPicker" name ="Fecha_Hora" type="datetime-local" value="{{$cita->Fecha_Hora}}">
        </div>
    </div>
       
       
 
<button type="submit" class="btn btn-default">Guardar</button>
</form>


@endsection
