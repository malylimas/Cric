@extends('layouts.app') @section('content')
    <div>
        <div class="row">
            <div class="col-md-4">
                <a class="btn btn-primary" href="ingreso/create?modulo={{$modulo}}">Crear Ingreso</a>
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
                            Fecha
                        </th>
                        <th>
                            Cantidad
                        </th>
                        <th>
                            Donante
                        <th>
                            Descripción
                        </th>
                        <th>
                            Cuenta de Ingreso
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($ingresos as $ingreso)
                        <tr>
                            <th>{{ $ingreso->id }}</th>
                            <th>{{ $ingreso->Fecha}}</th>
                            <th>{{ $ingreso->Cantidad }}</th>
                            <th>{{ $ingreso->donante}}</th>
                            <th>{{ $ingreso->Descripcion}}</th>
                            <th>{{ $ingreso->cuentaIngreso->Nombre}}</th>

                        </tr>
                    @endforeach

                    </tbody>

                </table>

            </div>
            {{ $ingresos->links() }}
        </div>
    </div>

@endsection