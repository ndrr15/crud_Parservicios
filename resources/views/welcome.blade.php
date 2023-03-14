@extends('layout/plantilla')
@section('title', 'Crud parservicios')
@section('contenedor')
    @php
        function edad($birthdate)
        {
            $fechaNacimiento = new DateTime($birthdate);
            $fechaActual = new DateTime(date('Y-m-d'));
            $diferencia = $fechaActual->diff($fechaNacimiento);
            return $diferencia->format('%y');
        }
    @endphp
    <div class="card">
        <div class="card-header">
            <h1>CRUD para prueba de parservicios</h1>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-sm-12">
                    @if ($mensaje = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{ $mensaje }}
                        </div>
                    @endif
                </div>
            </div>
            <p>
                <a href={{ route('InfoPersonas.create') }} class="btn btn-primary">
                    <span class="fas fa-user-plus" aria-hidden="true"></span> Agregar
                </a>
            </p>
            <hr>
            <p class="card-text">
            <div class="table table-responsive">
                <table class="table table-sm table-bordered">
                    <thead>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Identificación</th>
                        <th>Fecha nacimiento</th>
                        <th>Edad</th>
                        <th>Genero</th>
                        <th>Placa vehiculo</th>
                        <th>Dirección casa</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody>
                        @foreach ($datos as $item)
                            <tr>
                                <td>{{ $item->Name }}</td>
                                <td>{{ $item->Lastname }}</td>
                                <td>{{ $item->identification }}</td>
                                <td>{{ $item->birthdate }}</td>
                                <td>{{ edad($item->birthdate) }}</td>
                                <td>{{ $item->gender }}</td>
                                <td>{{ $item->idVehiculo }}</td>
                                <td>{{ $item->address }}</td>
                                <td>
                                    <form action={{ route('InfoPersonas.edit', $item->id) }} method="GET">
                                        <button class="btn btn-warning btn-sm">
                                            <span class="fas fa-edit"></span>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action={{ route('InfoPersonas.show', $item->id) }} method="GET">
                                        <button class="btn btn-danger btn-sm">
                                            <span class="fas fa-eraser"></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        {{ $datos->links() }}
                    </div>
                </div>
            </div>
            </p>
        </div>
    </div>

@endsection
