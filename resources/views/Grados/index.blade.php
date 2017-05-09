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
                <table class="table table-responsive table-striped table-hover">
                    <thead>
                    <tr>
                        <th>
                            #
                        </th>

                        <th>
                            Nombre
                        </th>
                            Acciones
                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($grados as $grado)
                        <tr>
                            <th>{{ $grado->id }}</th>
                            <th>{{ $grado->nombre}}</th>

                            <th>
                                <a href="/grados/{{$grado->id}}/edit">
                                    <i class="material-icons text-info">edit</i>
                                </a>

                            </th>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{ $grados->links() }}
        </div>
    </div>


@endsection