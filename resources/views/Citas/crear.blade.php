

@extends('layouts.form') 

@section('form-content')
    @define $pageTitle = 'Crear Citas'

<form action= "crear/{{$paciente->id}}" method="Post" role="form">
   {{ csrf_field()}}

    <div class="form-group">
        <label for="example-text-input" class="col-2 col-form-label">Nombre Del Paciente</label>
        <div class="col-10">
            <spam> {{$paciente->Nombre_Paciente}} </spam>
        </div>
    </div>

    <div class="form-group">
        <label for="example-text-input" class="col-2 col-form-label">Terapista</label>
        <div class="col-10">
            <select class="form-control"  name="terapista_id">
                @foreach ($terapistas as $terapista)
                    <option value="{{$terapista->id}}">{{$terapista->Nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>

       <div class="form-group">
      <label for="terapiaSelect" class="col-2 col-form-label">Tipo Terapia</label>
      <select id="terapiaSelect" name="terapia_id" class="form-control">
        
        @foreach($terapias as $terapia)
          <option value="{{$terapia->id}}"> {{$terapia->Nombre}} </option>
        @endforeach
      </select>
      </div> 
      
       

    <div class="form-group">
        <label for="patologiaCombo" class="col-2 col-form-label">Patologia</label>
        <div class="col-10">
            <select class="form-control"  name="Patologia_id" id="patologiaCombo" >
               
            </select>
        </div>
    </div>

    <div  class="form-group">
        <label for="fechaPicker" class="col-2 col-form-label">Fecha Hora</label>
        <div class="col-10">
            <input class="form-control" id= "fechaPicker" name = "Fecha_Hora" type="datetime-local">
        </div>
    </div>
   

 <button class= "btn btn-primary" type ="Submit" >Guardar</button>
</from>

@endsection
 

  @section('script')
  <script>
     var municipios = convertToJson('{{ $patologias->toJson() }}');
     loadChildCombo('#terapiaSelect','#patologiaCombo',municipios,'terapia_id','Nombre_Patologia')
  </script>
 @endSection