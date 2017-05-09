@extends('layouts.app') @section('content')
    <div>
        <div class="row">
            <a class="btn btn-primary" href="crear"> Crear Terapista</a>
        </div>
        <br>
        <div class="row">
            <div class="contianer">
                <table class="table table-striped table-hover table-responsive">
                    <thead>
                    <tr class="text-center">
                        <th>#</th>
                        </th>
                        <th><span class="text-center">Nombre</span></th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>
                            Acciones
                        </th>
                        <th>
                            <b> Disponibilidad</b>
                        </th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($terapistas as $terapista)
                        <tr>
                            <th scope="row">{{ $terapista->id }}</th>
                            <td>{{ $terapista->Nombre }}</td>
                            <td>{{ $terapista->Telefono }}</td>
                            <td>{{ $terapista->Direccion }}</td>

                            <td>
                                <div class="btn-group-sm" role="group">
                                    <a class="" href="modificar/{{$terapista->id}}">
                                        <i class="material-icons text-info">edit</i>
                                    </a>


                                @if($terapista->trashed())
                                    <a  href="habilitar/{{$terapista->id}}">
                                        <i class="material-icons text-primary">check</i>
                                    </a>
                                @else
                                    <a  href="eliminar/{{$terapista->id}}">
                                        <i class="material-icons text-danger">delete</i>
                                    </a>
                                @endif

                                </div>


                            </td>

                            <td>

                                <div class="btn-group" role="group" aria-label="...">
                                    <a type="button" class="btn btn-primary"
                                       href="disponibilidad/{{$terapista->id}}/?tipo=d&fechaDiaria={{$now}}">Disponibilidad</a>
                                </div>
                            </td>
                        </tr>



                    @endforeach
                    </tbody>
                </table>
            </div>
            {{ $terapistas->links() }}
        </div>
    </div>
@endsection