@extends('layouts.app')
@section('content')
    <div>
        <div class="row">
            <div class="col-md-4">
                <form action="factura/create" method="GET" class="form-inline">
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail3">Numero de Identidad del Paciente</label>
                        <input type="text" required name="numeroIdentidad" class="form-control" id="exampleInputEmail3"
                               placeholder="Identidad del Paciente">
                    </div>
                    <button class="btn btn-primary"> Crear Factura</button>
                </form>
            </div>
        </div>
        </br>
        <div class="row">
            <div class="contianer">
                <table class="table table-responsive table-striped table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Identidad</th>
                        <th>Nombre Paciente</th>
                        <th>Fecha/Hora</th>
                        <th>Descuento</th>
                        <th>SubTotal</th>
                        <th>Total</th>
                        <th>Acciones</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($facturas as $factura)
                        <tr>
                            <td>{{ $factura->id }}</td>
                            <td>{{ $factura->paciente->Identidad}}</td>
                            <td>{{ $factura->paciente->Nombre_Paciente}}</td>
                            <td>{{ $factura->Fecha_Hora}}</td>
                            <td>{{ $factura->descuento->Nombre}}</td>
                            <td>{{ $factura->SubTotal}}</td>
                            <td>{{ $factura->Total}}</td>
                            <td>

                                <div class="btn-group" role="group" aria-label="...">
                                    <a  href="modificar/{{$factura->id}}"><i
                                                class="material-icons text-info">edit</i> </a>
                                    <a href="/factura/imprimir/{{$factura->id}}"><i class="material-icons">print</i>
                                    </a>
                                </div>

                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{ $facturas->links() }}
        </div>
    </div>
    </div>

@endsection