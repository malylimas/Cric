 @extends('layouts.form') @section('form-content') @define $pageTitle = 'Crear Paciente'
<form action="crear" method="Post" role="form">
  {{ csrf_field()}}
  <div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">Identidad</label>
    <div class="col-10">
      <input class="form-control" type="text" name="Identidad" id="example-text-input">
    </div>
  </div>
  <div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">Nombre Del Paciente</label>
    <div class="col-10">
      <input class="form-control" type="text" name="Nombre_Paciente" id="example-text-input">
    </div>
  </div>
  <div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">Dirección Actual</label>
    <div class="col-10">
      <input class="form-control" type="text" name="Direccion_Actual" id="example-text-input">
    </div>
  </div>
  <div id="date-container" class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">Fecha De Nacimiento</label>
    <div class="col-10">
      <input class="form-control" type="text" name="Fecha_Nacimiento" id="example-text-input">
    </div>
  </div>
  <div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">Telefono</label>
    <div class="col-10">
      <input class="form-control" type="text" name="Telefono" id="example-text-input">
    </div>
  </div>
  <div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">Ocupacion</label>
    <div class="col-10">
      <input class="form-control" type="text" name="Ocupacion" id="example-text-input">
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
  </div>

  <div class="form-group row">
    <label for="disabledSelect">Municipio</label>
    <div class="col-10">
      <select id="disabledSelect" name="municipio_id" class="form-control">    
          @foreach($municipios as $municipio)
            <option value="{{$municipio->id}}"> {{$municipio->Nombre_Municipio}} </option>
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

  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection