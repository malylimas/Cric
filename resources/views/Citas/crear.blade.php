@extends('layouts.app')

@section('content')

<form action= "crear/{{$expediente->id}}" method="Post" role="form">
   {{ csrf_field()}}

    <div class="form-group">
        <label for="example-text-input" class="col-2 col-form-label">Nombre Del Paciente</label>
        <div class="col-10">
            <spam> {{$expediente->Nombre_Paciente}} </spam>
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
        <label for="patologiaCombo" class="col-2 col-form-label">Patologia</label>
        <div class="col-10">
            <select class="form-control"  name="terapista_id" id="patologiaCombo" >
                @foreach ($patologias as $patologia)
                    <option value="{{$patologia->id}}">{{$patologia->Nombre_Patologia}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="fechaPicker" class="col-2 col-form-label">Fecha</label>
        <div class="col-10">
            <input class="form-control" id= "fechaPicker" name = "Fecha" type="datetime-local">
        </div>
    </div>
   
    

    

    

 <button class= "btn btn-primary" type ="Submit" >Guardar</button>
</from>

@endsection
 