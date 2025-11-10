@extends('layouts.app')

@section('title', 'Turnos Pendientes y Reasignados')

@section('content_header')
<div class="bg-white shadow-sm">
    <div class="container d-flex justify-content-between align-items-center py-3">
        <!-- Logo y título -->
        <div class="d-flex align-items-center gap-3">
            <img src="{{ asset('imagenes/logo.jpg') }}" alt="Logo" style="height:60px;">
            <h2 class="m-0 fw-bold" style="color:#333;">GestionTurnos</h2>
        </div>
    </div>

    <!-- Barra verde de navegación -->
    <div class="bg-success">
        <div class="container d-flex justify-content-center gap-5 py-2">
            <a href="{{ route('welcome') }}" class="text-white fw-semibold text-decoration-none">Inicio</a>
            <a href="{{ route('usuario.index') }}" class="text-white fw-semibold text-decoration-none">Usuarios</a>
            <a href="{{ route('empleado.index') }}" class="text-white fw-semibold text-decoration-none">Empleados</a>
            <a href="{{ route('dependencia.index') }}" class="text-white fw-semibold text-decoration-none">Dependencias</a>
        </div>
    </div>
</div>

{{-- TÍTULO DE LA SECCIÓN --}}
<h3 class="text-center my-4 fw-bold" style="color:#333;">Turnos Pendientes y Reasignados</h3>
@endsection

@section('Content')
<div class="container mb-5">

    {{-- BOTONES SUPERIORES --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <!-- Botón Volver -->
        <a href="{{ route('Turno.index') }}"
            class="btn fw-bold px-4 shadow-sm"
            style="background-color:#333333; color:yellow; border-radius:8px;">
            <i class="bi bi-arrow-left-circle"></i> Volver
        </a>
    </div>

    {{-- TABLA DE TURNOS --}}
    <div class="row">
        <div class="col-12">
            <div class="table-responsive rounded shadow-sm">
                <table class="table table-bordered align-middle text-center mb-0"
                    style="background-color:white; color:#333;">
                    <thead style="background-color:#a8e6a1; color:#333;">
                        <tr>
                            <th>ID</th>
                            <th>Código Turno</th>
                            <th>Estado</th>
                            <th>Fecha</th>
                            <th>Hora Inicio</th>
                            <th>Hora Fin</th>
                            <th>Usuario</th>
                            <th>Servicio</th>
                            <th>Empleado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($turnos->isEmpty())
                            <tr>
                                <td colspan="10" class="text-center text-muted">
                                    No hay turnos pendientes ni reasignados.
                                </td>
                            </tr>
                        @else
                            @foreach ($turnos as $turno)
                                <tr>
                                    <td>{{ $turno->id }}</td>
                                    <td>{{ $turno->codigoTurno }}</td>
                                    <td>
                                        @if ($turno->estadoTurno == 'Pendiente')
                                            <span class="badge bg-warning text-dark">Pendiente</span>
                                        @elseif ($turno->estadoTurno == 'Reasignado')
                                            <span class="badge bg-info text-dark">Reasignado</span>
                                        @endif
                                    </td>
                                    <td>{{ $turno->fecha }}</td>
                                    <td>{{ $turno->horaInicio ?? '—' }}</td>
                                    <td>{{ $turno->horaFin ?? '—' }}</td>
                                    <td>{{ $turno->usuario->numeroDocumento ?? '—' }}</td>
                                    <td>{{ $turno->servicio->nombreServicio ?? '—' }}</td>
                                    <td>{{ $turno->empleado->nombreCompleto ?? '—' }}</td>

                                    <td class="d-flex justify-content-center gap-2">
                                        <!-- Botón Llamar -->
                                        <a href="{{ route('Turno.llamar', $turno->id) }}"
                                            class="btn btn-sm fw-bold px-3 shadow-sm"
                                            style="background-color:#ffc107; color:#333; border-radius:6px;">
                                            <i class="bi bi-telephone-fill"></i> Llamar
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
