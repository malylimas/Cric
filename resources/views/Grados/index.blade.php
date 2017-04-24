@extends('layouts.app') 
@section('content')
<div>
    <div class="row">
        <div class="col-md-4">



                <a class="btn btn-primary" href="/grados/create"> Crear Grados</a>
           
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
                    @foreach ($grados as $grado)
                    <tr>
                        <th>{{ $grado->id }}</th>
                        <th>{{ $grado->nombre}}</th>
                        
                        <th><center><a class="btn btn-primary" href="/grados/{{$grado->id}}/edit">Modificar</a></center></th>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $grados->links() }}
    </div>
</div>


@endsection