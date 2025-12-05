@extends('layouts.app')

@section('title', 'editar asignacion de empleado a dependencia')

@section('Content')
<div class="d-flex justify-content-center align-items-center" style="min-height:100vh; background:#f7f7f7;">
    <div class="p-4 shadow" style="width:420px; background:white; border-radius:8px;">

        {{-- Encabezado --}}
        <div class="d-flex justify-content-between align-items-center mb-4 px-2">
            <div>
                <h2 style="font-family: Arial, Helvetica, sans-serif; font-weight:bold; margin:0;">
                    <span style="color:black;">Gestion</span>
                    <span style="color:#4CAF50;">Turnos</span>
                </h2>
            </div>
            <div>
                <img src="{{ asset('imagenes/logo.jpg') }}" alt="Logo" style="height:60px;">
            </div>
        </div>

        {{-- Título --}}
        <div class="text-center mb-3">
            <h5 class="fw-bold text-dark">EDTIAR ASIGNACION DE EMPLEADO</h5>
        </div>

        {{-- Mensaje de éxito --}}
        @if(session('success'))
            <div class="alert alert-success text-center p-2">{{ session('success') }}</div>
        @endif

        {{-- Formulario --}}
        <form action="{{ route('EmpleadoD.update',$EmpleadoDe->id) }}" method="POST">
            @csrf

            {{-- Empleado --}}
            <div class="mb-3">
                <label for="idEmpleado" class="form-label fw-semibold">Empleado</label>
                <select name="idEmpleado" id="idEmpleado" class="form-select form-select-sm @error('idEmpleado ') is-invalid @enderror">
                    <option value="">Seleccione un empleado</option>
                    @foreach($empleados as $empleado)
                        <option value="{{ $empleado->id }}" {{ $EmpleadoDe->idEmpleado == $empleado->id ? 'selected' : '' }}>{{ $empleado->nombreCompleto }}</option>
                    @endforeach
                </select>
                @error('idEmpleado ')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Dependencia --}}
            <div class="mb-3">
                <label for="idDependencia" class="form-label fw-semibold">Dependencia</label>
                <select name="idDependencia" id="idDependencia" class="form-select form-select-sm @error('idDependencia') is-invalid @enderror">
                    <option value="">Seleccione una dependencia</option>
                    @foreach($dependencias as $dependencia)
                        <option value="{{ $dependencia->id }}" {{ $EmpleadoDe->idDependencia == $dependencia->id ? 'selected' : '' }}>{{ $dependencia->nombre }}</option>
                    @endforeach
                </select>
                @error('idDependencia')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Botón Actualizar --}}
            <div class="d-grid">
                <button type="submit" class="btn btn-success btn-sm py-2 fw-bold">
                    ACTUALIZAR
                </button>
            </div>

            {{-- Botón Volver --}}
            <div class="text-center mt-3">
                <a href="{{ url()->previous() }}" class="btn btn-link text-decoration-none text-danger fw-semibold">
                    ← Volver
                </a>
            </div>
        </form>
    </div>
</div>
@endsection