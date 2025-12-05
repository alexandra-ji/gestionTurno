@extends('layouts.app')

@section('title', 'Editar HistorialServicio')

@section('Content')
<div class="d-flex justify-content-center align-items-center" style="min-height:100vh; background:#f7f7f7;">
    <div class="p-4 shadow" style="width:420px; background:white; border-radius:8px;">

        {{-- Encabezado con texto y logo --}}
        <div class="d-flex justify-content-between align-items-center mb-4 px-2">
            <div>
                <h2 style="font-family: Arial, Helvetica, sans-serif; font-weight:bold; margin:0;">
                    <span style="color:black;">Gestion</span>
                    <span style="color:#4CAF50;">Turnos</span>
                </h2>
            </div>

            {{-- Logo --}}
            <div>
                <img src="{{ asset('imagenes/logo.jpg') }}"
                     alt="Logo"
                     style="height:60px;">
            </div>
        </div>

        {{-- Título del formulario --}}
        <div class="text-center mb-3">
            <h5 class="fw-bold text-dark">EDITAR HISTORIAL SERVICIO</h5>
        </div>

        {{-- Formulario de edición --}}
        <form action="{{ route('Historial.update', $historial->id) }}" method="POST">
            @csrf

            {{-- Fecha Salida --}}
            <div class="mb-3">
                <label for="fechaSalida" class="form-label">Fecha Salida</label>
                <input 
                    type="datetime-local" 
                    class="form-control form-control-sm" 
                    id="fechaSalida" 
                    name="fechaSalida"
                    value="{{ $historial->fechaSalida ? date('Y-m-d\TH:i', strtotime($historial->fechaSalida)) : '' }}">
            </div>

            {{-- Turno --}}
            <div class="mb-3">
                <label for="idTurno" class="form-label">Turno</label>
                <select name="idTurno" id="idTurno" class="form-select form-select-sm">
                    <option value="">Seleccione un Turno</option>
                    @foreach($turnos as $turno)
                        <option value="{{ $turno->id }}" 
                            {{ $turno->id == $historial->idTurno ? 'selected' : '' }}>
                            {{ $turno->codigoTurno }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Botón Actualizar --}}
            <div class="d-grid">
                <button type="submit" class="btn btn-success btn-sm py-2 fw-bold">
                    ACTUALIZAR
                </button>
            </div>

            {{-- Botón Volver --}}
            <div class="text-center mt-3">
                <a href="{{ route('Historial.index') }}"
                   class="btn btn-link text-decoration-none text-danger fw-semibold">
                    ← Volver
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
