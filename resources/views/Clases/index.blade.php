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
                <table class="table table-responsive table-striped table-hover">
                    <thead>
                    <tr>
                        <th>#</th>

                        <th>
                            Nombre
                        </th>

                        <th>
                           Acciones
                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($clases as $clase)
                        <tr>
                            <td>{{ $clase->id }}</td>
                            <td>{{ $clase->nombre}}</td>

                            <td>
                                <a  href="/clases/{{$clase->id}}/edit">
                                    <i class="text-info material-icons">edit</i>
                                </a>

                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{ $clases->links() }}
        </div>
    </div>


@endsection