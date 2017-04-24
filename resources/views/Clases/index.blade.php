@extends('layouts.app') 
@section('content')
<div>
    <div class="row">
        <div class="col-md-4">



                <a class="btn btn-primary" href="/clases/create"> Crear Clases</a>
           
        </div>
    </div>
    </br>
    <div class="row">
        <div class="contianer">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                            <center><b>#</center></b></th>

                        <th>
                            <center><b>Nombre</center></b></th>

                            <th>
                            <center><b>Acciones</center></b></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($clases as $clase)
                    <tr>
                        <th>{{ $clase->id }}</th>
                        <th>{{ $clase->nombre}}</th>
                        
                        <th><center><a class="btn btn-primary" href="/clases/{{$clase->id}}/edit">Modificar</a></center></th>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $clases->links() }}
    </div>
</div>


@endsection