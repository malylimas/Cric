
@extends('layouts.form') 

@section('form-content')
    @define $pageTitle = 'Modificar Paciente'
<form action= "/Paciente/modificar/{{$paciente->id}}" method="Post" role="form">
   {{ csrf_field()}}


<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Identidad</label>
  <div class="col-10">
    <input class="form-control" type="text" name="Identidad" value = "{{$paciente->Identidad}}" id="example-text-input">
  </div>
</div>

<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Nombre del Paciente</label>
  <div class="col-10">
    <input class="form-control" type="text" name="Nombre_Paciente" value="{{ $paciente->Nombre_Paciente}}"   id="example-text-input">
  </div>
</div>
<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Dirección Actual</label>
  <div class="col-10">
    <input class="form-control" type="text" name="Direccion_Actual" value = "{{$paciente->Direccion_Actual}}" id="example-text-input">
  </div>
</div>

  <div id="date-container" class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Fecha De Nacimiento</label>
  <div class="col-10">
    <input class="form-control" type="text" name="Fecha_Nacimiento" value = "{{$paciente->Fecha_Nacimiento}}" id="example-text-input">
  </div>
</div>

  <div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Teléfono</label>
  <div class="col-10">
    <input class="form-control" type="text" name="Telefono" value = "{{$paciente->Telefono}}" id="example-text-input">
  </div>
</div>

 <div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Ocupación</label>
  <div class="col-10">
    <input class="form-control" type="text" name="Ocupacion" value = "{{$paciente->Ocupacion}}" id="example-text-input">
  </div>
</div>

<div class="form-group row">
  <label for="disabledSelect">Nivel Educativo</label>
  <div class="col-10">
  <select id="disabledSelect" name="nivel_id" class="form-control">
    
    @foreach($niveles as $nivel)
      <option value="{{$nivel->id}}"> {{$nivel->Descripcion}} </option>
    @endforeach
      </select

  </div>
  </div>
  </div>


   <div class="form-group row">
    <label for="dptoSelect">Departamento</label>
    <select id="dptoSelect" name="departamento_id" class="form-control">
    
     @foreach($departamentos as $departamento)
       <option value="{{$departamento->id}}"> {{$departamento->Nombre_Departamento}} </option>
     @endforeach
      </select
    </div>
    </div> 


   <div class="form-group row">
   <label for="municipioSelect">Municipio</label>
   <div class="col-10">
   <select id="municipioSelect" name="municipio_id" class="form-control">
    
   
      </select
  </div>
  </div>
  </div>


<div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
</div>
</form



@endsection

 @section('script')
  <script>
     var municipios = convertToJson('{{ $municipios->toJson() }}');
     loadChildCombo('#dptoSelect','#municipioSelect',municipios,'departamento_id','Nombre_Municipio')
  </script>
 @endSection