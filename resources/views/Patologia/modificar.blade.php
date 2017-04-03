
@extends('layouts.form') 

@section('form-content')
    @define $pageTitle = 'Modificar Patologia'


<form action= "/Patologia/modificar/{{$patologia->id}}" method="POST" role="form">
   {{ csrf_field()}}
  
  <div class="form-group">
    <label for="example-text-input">Nombre De Patologia</label>
    <input type="text" class="form-control" name= "Nombre_Patologia" id="example-text-input"value= "{{$patologia->Nombre_Patologia}}">
  </div>


  <div class="form-group">
      <label for="disabledSelect">Tipo Terapia</label>
      <select id="disabledSelect" name="terapia_id" class="form-control">
       
        @foreach($terapias as $terapia)
            @if ($terapia->id ===  $patologia->terapia->id)
                <option value="{{$terapia->id}}" selected> {{$terapia->Nombre}} </option>
            @else
                <option value="{{$terapia->id}}"> {{$terapia->Nombre}} </option>
            @endif
        @endforeach

      </select>
 </div>
  
 
<button type="submit" class="btn btn-primary">Guardar</button>
</form>


@endsection
