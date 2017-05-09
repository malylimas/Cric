@extends('layouts.app')
@section('content')
    <div>
        <div class="row">

            <a class="btn btn-primary" href="egreso/create?modulo={{$modulo}}"> Crear Egreso</a>
        </div>
    </div>
    </br>
    <div class="row">
        <div class="contianer">
            <table class="table table-responsive table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Fecha</th>
                    <th>Beneficiario</th>
                    <th>Descripcion</th>
                    <th>Cantidad</th>
                    @if ($modulo === 'banco')
                        <th>Numero Cheque</th>
                    @endif

                    <th>Cuenta Egreso</th>


                </tr>
                </thead>
                <tbody>
                @foreach ($egresos as $egreso)
                    <tr>
                        <td>{{ $egreso->id }}</td>
                        <td>{{ $egreso->Fecha}}</td>
                        <td>{{ $egreso->beneficiario}}</td>
                        <td>{{ $egreso->Descripcion}}</td>
                        <td>{{ $egreso->Cantidad}}</td>

                        @if ($modulo === 'banco')
                            <td>{{ $egreso->numero_cheque}}</td>
                        @endif

                        <td>{{ $egreso->cuentaEgreso->Nombre}}</td>


                @endforeach
                </tbody>
            </table>
        </div>
        {{$egresos->links()}}
    </div>
    </div>

@endsection