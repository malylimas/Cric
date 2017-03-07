@extends('layouts.app')

@section('content')
<div>
    <div  class ="row">
        <form action= "crear" method="GET" class="form-inline">
           <div class="form-group">
                <label class="sr-only" for="exampleInputEmail3">Numero Identidad</label>
                <input type="text" required name="numeroIdentidad" class="form-control" id="exampleInputEmail3" placeholder="Numero Identidad">
            </div>
        <button class="btn btn-primary"> Crear Cita</button>
        </form>
        
    </div>
  
</div>
@endsection
         
 