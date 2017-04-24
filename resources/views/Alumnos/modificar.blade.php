@extends('layouts.form') 
 @section('form-content') 
 @define $pageTitle = 'Crear Alumno'
<form action="/alumnos/{{$alumno->id}}" method="Post" role="form">
  {{ csrf_field()}}
  {{ method_field('PUT') }}
  <div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">Identidad</label>
    <div class="col-10">
      <input class="form-control" type="text" name="identidad" id="example-text-input" value="{{ $alumno->identidad }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">Nombre del Alumno</label>
    <div class="col-10">
      <input class="form-control" type="text" name="nombre" id="example-text-input" value="{{ $alumno->nombre }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">Dirección Actual</label>
    <div class="col-10">
      <input class="form-control" type="text" name="direccion" id="example-text-input" value="{{ $alumno->direccion }}">
    </div>
  </div>
  <div id="date-container" class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">Fecha De Nacimiento</label>
    <div class="col-10">
      <input class="form-control" type="text" name="fechaNacimiento" id="example-text-input" value="{{ $alumno->fechaNacimiento->format('d/m/Y')}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">Teléfono</label>
    <div class="col-10">
      <input class="form-control" type="text" name="telefono" id="example-text-input" value="{{ $alumno->telefono }}" >
    </div>
  </div>
  <div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">Encargado</label>
    <div class="col-10">
      <input class="form-control" type="text" name="nombreEncargado" id="example-text-input" value="{{ $alumno->nombreEncargado }}">
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
