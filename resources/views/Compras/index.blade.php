@extends('layouts.app')
@section('content')
    <div>
        <div class="row">
            <div class="col-md-4">
                <form action="compra/create" method="GET" class="form-inline">

                    <button class="btn btn-primary"> Crear Compras</button>
                </form>
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
                            Fecha
                        </th>
                        <th>
                            Descripción
                        </th>
                        <th>
                            Proveedores
                        </th>
                        <th>
                            Cantidad
                        </th>
                        <th>
                            Número de Factura
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($compras as $compra)
                        <tr>
                            <td>{{ $compra->id }}</td>
                            <td>{{ $compra->Fecha}}</td>
                            <td>{{ $compra->Descripcion}}</td>
                            <td>{{ $compra->proveedores->Nombre}}</td>
                            <td>{{ $compra->cantidad}}</td>
                            <td>{{ $compra->NumeroFactura}}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{ $compras->links() }}
        </div>
    </div>
    </div>

@endsection