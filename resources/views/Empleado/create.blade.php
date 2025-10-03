@extends('layouts.app')

@section('title', 'Crear Empleado' )

@section('Content')
<div class="d-flex justify-content-center align-items-center" style="min-height:100vh; background:#f7f7f7;">
    <div class="p-4 shadow" style="width:420px; background:white; border-radius:8px;">

        <div class="d-flex justify-content-between align-items-center mb-4 px-2">
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
            <h5 class="fw-bold text-dark">REGISTRO DE EMPLEADOS</h5>
        </div>

        <form action="{{route('empleado.store') }}" method="POST">
            @csrf

            {{-- Nombre Completo --}}
            <div class="mb-3">
                <input type="text" name="nombreCompleto" class="form-control form-control-sm  @error('nombreCompleto') is-invalid @enderror"
                       placeholder="Nombre Completo del Empleado">

                        @error('nombreCompleto')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Número de Documento --}}
            <div class="mb-3">
                <input type="number" name="numeroDocumento" class="form-control form-control-sm  @error('numeroDocumento') is-invalid @enderror"
                       placeholder="Número de Documento">
                        @error('numeroDocumento')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            {{-- Teléfono --}}
            <div class="mb-3">
                <input type="number" name="telefono" class="form-control form-control-sm  @error('telefono') is-invalid @enderror"
                       placeholder="Teléfono">

                        @error('telefono')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Correo --}}
            <div class="mb-3">
                <input type="email" name="correo" class="form-control form-control-sm @error('correo') is-invalid @enderror"
                       placeholder="Correo" >

                        @error('correo')
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
                <a href="{{ route('empleado.index') }}"
                   class="btn btn-link text-decoration-none text-danger fw-semibold">
                    ← Volver
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
