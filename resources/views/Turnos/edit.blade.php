@extends('layouts.app')

@section('title', 'Editar Turno')

@section('Content')
<div class="d-flex justify-content-center align-items-center" style="min-height:100vh; background:#f7f7f7;">
    <div class="p-4 shadow" style="width:420px; background:white; border-radius:8px;">

        <div class="d-flex justify-content-between align-items-center mb-4 px-2">
            {{-- Texto GestionTurnos --}}
            <div>
                <h2 style="font-family: Arial, Helvetica, sans-serif; font-weight:bold; margin:0;">
                    <span style="color:black;">Gestion</span>
                    <span style="color:#4CAF50;">Turnos</span>
                </h2>
            </div>

            {{-- Logo --}}
            <div>
                <img src="{{ asset('imagenes/logo.jpg') }}" alt="Logo" style="height:60px;">
            </div>
        </div>

        {{-- Título del formulario --}}
        <div class="text-center mb-3">
            <h5 class="fw-bold text-dark">EDITAR TURNO</h5>
        </div>

        {{-- Formulario --}}
        <form action="{{route('Turno.update', $turnos->id) }}" method="POST">
            @csrf
         {{-- Código del Turno --}}
            <div class="mb-3">
                <input type="text" name="codigoTurno" class="form-control form-control-sm"
                       value="{{ $turnos->codigoTurno }}" placeholder="Código del Turno" >
            </div>

            {{-- Estado del Turno --}}
            <div class="mb-3">
                <select name="estadoTurno" class="form-select form-select-sm" >
                    <option value="">Seleccione el estado del turno</option>
                    <option value="Pendiente" {{ $turnos->estadoTurno == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="En Atención" {{ $turnos->estadoTurno == 'En Atención' ? 'selected' : '' }}>En Atención</option>
                    <option value="Atendido" {{ $turnos->estadoTurno == 'Atendido' ? 'selected' : '' }}>Atendido</option>
                    <option value="Cancelado" {{ $turnos->estadoTurno == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
                    <option value="Ausente" {{ $turnos->estadoTurno == 'Ausente' ? 'selected' : '' }}>Ausente</option>
                    <option value="Reasignado" {{ $turnos->estadoTurno == 'Reasignado' ? 'selected' : '' }}>Reasignado</option>
                </select>
            </div>

            {{-- Fecha --}}
            <div class="mb-3">
                <input type="date" name="fecha" class="form-control form-control-sm"
                       value="{{ $turnos->fecha }}" >
            </div>

            {{-- Hora Inicio --}}
            <div class="mb-3">
                <input type="time" name="horaInicio" class="form-control form-control-sm"
                       value="{{ $turnos->horaInicio }}" >
            </div>

            {{-- Hora Fin --}}
            <div class="mb-3">
                <input type="time" name="horaFin" class="form-control form-control-sm"
                       value="{{ $turnos->horaFin }}" >
            </div>

            {{-- Usuario --}}
            <div class="mb-3">
                <label for="idUsuario" class="form-label">Usuario</label>
                <select name="idUsuario" id="idUsuario" class="form-select form-select-sm" >
                    <option value="">Seleccione un usuario</option>
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" {{ $turnos->idUsuario == $usuario->id ? 'selected' : '' }}>
                            {{ $usuario->numeroDocumento }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Servicio --}}
            <div class="mb-3">
                <label for="idServicio" class="form-label">Servicio</label>
                <select name="idServicio" id="idServicio" class="form-select form-select-sm" >
                    <option value="">Seleccione un servicio</option>
                    @foreach($servicios as $servicio)
                        <option value="{{ $servicio->id }}" {{ $turnos->idServicio == $servicio->id ? 'selected' : '' }}>
                            {{ $servicio->nombreServicio }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Empleado --}}
            <div class="mb-3">
                <label for="idEmpleado" class="form-label">Empleado</label>
                <select name="idEmpleado" id="idEmpleado" class="form-select form-select-sm" >
                    <option value="">Seleccione un empleado</option>
                    @foreach($empleados as $empleado)
                        <option value="{{ $empleado->id }}" {{ $turnos->idEmpleado == $empleado->id ? 'selected' : '' }}>
                            {{ $empleado->nombreCompleto }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Botón Guardar --}}
            <div class="d-grid">
                <button type="submit" class="btn btn-success btn-sm py-2 fw-bold">
                    GUARDAR
                </button>
            </div>

            {{-- Botón Volver --}}
            <div class="text-center mt-3">
                <a href="{{ route('Turno.index') }}"
                   class="btn btn-link text-decoration-none text-danger fw-semibold">
                    ← Volver
                </a>
            </div>
        </form>

    </div>
</div>
@endsection
