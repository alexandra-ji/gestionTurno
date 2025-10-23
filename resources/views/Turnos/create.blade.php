@extends('layouts.app')

@section('title', 'Crear Turno')

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

            {{-- Logo--}}
            <div>
                <img src="{{ asset('imagenes/logo.jpg') }}"
                    alt="Logo"
                    style="height:60px;">
            </div>
        </div>

        {{-- Título del formulario --}}
        <div class="text-center mb-3">
            <h5 class="fw-bold text-dark">REGISTRO DE TURNOS</h5>
        </div>

        <form action="{{route('Turno.store')}}" method="POST">
            @csrf

            {{-- Código Del Turno --}}
            <div class="mb-3">
                <label for="codigoTurno" class="form-label">Codigo Turno </label>
                <input type="text" class="form-control @error('codigoTurno') is-invalid @enderror"
                    id="codigoTurno" name="codigoTurno">
                @error('codigoTurno')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            {{-- Estado Del Turno --}}
            <div class="mb-3">
                <label for="estadoTurno" class="form-label">Estado Del Turno </label>
                <select name="estadoTurno" class="form-select  @error('estadoTurno') is-invalid @enderror">
                    <option value="">Seleccione el estado del turno</option>
                    <option value="Pendiente">Pendiente</option>
                    <option value="En Atención">En Atención</option>
                    <option value="Atendido">Atendido</option>
                    <option value="Cancelado">Cancelado</option>
                    <option value="Ausente">Ausente</option>
                    <option value="Reasignado">Reasignado</option>
                </select>
                @error('estadoTurno')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Fecha --}}
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control @error('fecha') is-invalid @enderror"
                    id="fecha" name="fecha">
                @error('fecha')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- HoraInicio --}}
            <div class="mb-3">
                <label for="horaInicio" class="form-label">Hora Inicio</label>
                <input type="time" class="form-control @error('horaInicio') is-invalid @enderror"
                    id="horaInicio" name="horaInicio">
                @error('horaInicio')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            {{-- horaFin --}}
            <div class="mb-3">
                <label for="horaFin" class="form-label">hora Fin </label>
                <input type="time" class="form-control @error('horaFin') is-invalid @enderror"
                    id="horaFin" name="horaFin">
                @error('horaFin')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="idUsuario" class="form-label   @error('idUsuario') is-invalid @enderror">Usuario</label>
                <select name="idUsuario" id="idUsuario" class="form-select">
                    <option value="">Seleccione un usuario</option>
                    @foreach($usuarios as $usuario)
                    <option value="{{$usuario->id}}">{{$usuario->nombre}}</option>
                    @endforeach
                </select>

                @error('idUsuario')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="idServicio" class="form-label   @error('idServicio') is-invalid @enderror">Servicio</label>
                <select name="idServicio" id="idServicio" class="form-select">
                    <option value="">Seleccione un servicio</option>
                    @foreach($servicios as $servicio)
                    <option value="{{$servicio->id}}">{{$servicio->nombreServicio}}</option>
                    @endforeach
                </select>

                @error('idServicio')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="idEmpleado" class="form-label   @error('idEmpleado') is-invalid @enderror">Empleado</label>
                <select name="idEmpleado" id="idEmpleado" class="form-select">
                    <option value="">Seleccione un Empleado</option>
                    @foreach($empleados as $empleado)
                    <option value="{{$empleado->id}}">{{$empleado->nombreCompleto}}</option>
                    @endforeach
                </select>

                @error('idEmpleado')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
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