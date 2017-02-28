@extends('layouts.app')

@section('content')

<form action= "modificar"  method="Post" role="form">
   {{ csrf_field()}}

<div class="form-group row">
  <label for="example-text-input" >Nombre De Patologia</label>
  <input class="form-control" type="text" name= "Nombre_Patologia"  id="example-text-input" value= "{{$patologia->Nombre_Patologia}}">
  </div>

<div class="form-group">
      <label for="disabledSelect">Tipo Terapia</label>
      <select id="disabledSelect" name="Tipo_terapia" class="form-control">
       
        @foreach($terapias as $terapia)
          @if ($terapia->id =  $patologia->terapia->id)
            <option value="{{$terapia->id}}" selected> {{$terapia->Nombre}} </option>
          @else
            <option value="{{$terapia->id}}"> {{$terapia->Nombre}} </option>
          @endif
        @endforeach

      </select>
    </div>
  
 
<button type="submit" class="btn btn-default">Guardar</button>
</form>


@endsection
