@extends('layouts.app')

@section('title', 'Crear Usuario')

@section('Content')
<div class="d-flex justify-content-center align-items-center" style="min-height:100vh; background:#f7f7f7;">
    
    <div class="p-4 shadow" style="width:420px; background:white; border-radius:8px;">

        {{-- Encabezado--}}
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
            <h5 class="fw-bold text-dark">REGISTRO DE USUARIO</h5>
        </div>

        <form action="{{ route('usuario.store') }}" method="POST">
            @csrf

            {{-- Tipo de Documento --}}
            <div class="mb-3">
                <option value="">Tipo de Documento</option>
                <select name="tipoDocumento" class="form-control form-select-sm  @error('tipoDocumento') is-invalid @enderror">
                    <option value="Cedula De Ciudadania">Cédula de Ciudadanía</option>
                    </select>
                 @error('tipoDocumento')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Número de Documento --}}
            <div class="mb-3">
                <input type="number" name="numeroDocumento" class="form-control form-control-sm @error('numeroDocumento') is-invalid @enderror"
                       placeholder="Número de Documento" >
                       @error('numeroDocumento')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Nombre --}}
            <div class="mb-3">
                <input type="text" name="nombre" class="form-control form-control-sm @error('nombre') is-invalid @enderror"
                       placeholder="Nombre del Usuario" oninput="this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '')">

                       @error('nombre')
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

            {{-- Teléfono --}}
            <div class="mb-3">
                <input type="number" name="telefono" class="form-control form-control-sm @error('telefono') is-invalid @enderror"
                       placeholder="Teléfono" >

                       @error('telefono')
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
                <a href="{{ route('usuario.index') }}"
                   class="btn btn-link text-decoration-none text-danger fw-semibold">
                    ← Volver
                </a>
            </div> 
        </form>
    </div>
</div>
@endsection
