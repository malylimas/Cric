@extends('layouts.app')

@section('content')

<form action= "crear" method="Post" role="form">
   {{ csrf_field()}}
  
  <div class="form-group">
    <label for="example-text-input">Nombre Patologia</label>
    <input type="text" class="form-control" name= "Nombre_Patologia" id="example-text-input">
  </div>
  <div class="form-group">
      <label for="disabledSelect">Tipo Terapia</label>
      <select id="disabledSelect" name="terapia_id" class="form-control">
        
        @foreach($terapias as $terapia)
          <option value="{{$terapia->id}}"> {{$terapia->Nombre}} </option>
        @endforeach
      </select>
      </div> 
  
      <button type="submit" class="btn btn-primary">Guardar</button>
</form>
    

@endsection