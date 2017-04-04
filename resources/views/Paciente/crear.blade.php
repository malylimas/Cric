 @extends('layouts.form') 
 @section('form-content') 
 @define $pageTitle = 'Crear Paciente'
<form action="crear" method="Post" role="form">
  {{ csrf_field()}}
  <div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">Identidad</label>
    <div class="col-10">
      <input class="form-control" type="text" name="Identidad" id="example-text-input" value="{{ old('Identidad') }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">Nombre del Paciente</label>
    <div class="col-10">
      <input class="form-control" type="text" name="Nombre_Paciente" id="example-text-input" value="{{ old('Nombre_Paciente') }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">Dirección Actual</label>
    <div class="col-10">
      <input class="form-control" type="text" name="Direccion_Actual" id="example-text-input" value="{{ old('Direccion_Actual') }}">
    </div>
  </div>
  <div id="date-container" class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">Fecha De Nacimiento</label>
    <div class="col-10">
      <input class="form-control" type="text" name="Fecha_Nacimiento" id="example-text-input" value="{{ old('Fecha_Nacimiento') }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">Teléfono</label>
    <div class="col-10">
      <input class="form-control" type="text" name="Telefono" id="example-text-input" value="{{ old('Telefono') }}" >
    </div>
  </div>
  <div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">Ocupación</label>
    <div class="col-10">
      <input class="form-control" type="text" name="Ocupacion" id="example-text-input" value="{{ old('Ocupacion') }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="disabledSelect">Nivel Educativo</label>
    <div class="col-10">
      <select id="disabledSelect" name="nivel_id" class="form-control">
    
    @foreach($niveles as $nivel)
      <option value="{{$nivel->id}}"> {{$nivel->Descripcion}} </option>
    @endforeach
      </select>
  </div>
  </div>
   
    <div class="form-group row">
    <label for="dptoSelect">Departamento</label>
    <select id="dptoSelect" name="departamento_id" class="form-control">
    
     @foreach($departamentos as $departamento)
       <option value="{{$departamento->id}}"> {{$departamento->Nombre_Departamento}} </option>
     @endforeach
      </select>
   </div>



  <div class="form-group row">
    <label for="municipioSelect">Municipio</label>
    <div class="col-10">
      <select id="municipioSelect" name="municipio_id" class="form-control">    
          
      </select>
  </div>
  </div>
  
  

  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection


 @section('script')
  <script>
     var municipios = convertToJson('{{ $municipios->toJson() }}');
     loadChildCombo('#dptoSelect','#municipioSelect',municipios,'departamento_id','Nombre_Municipio')
  </script>
 @endSection

 