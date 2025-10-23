@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('Content')
<div class="d-flex justify-content-center align-items-center" style="min-height:100vh; background:#f7f7f7;">
    <div class="p-4 shadow" style="width:420px; background:white; border-radius:8px;">

        {{-- Encabezado --}}
        <div class="d-flex justify-content-between align-items-center mb-4 px-2">
            {{-- Texto SenaTurnos --}}
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
            <h5 class="fw-bold text-dark">EDITAR USUARIO</h5>
        </div>

        <form action="{{ route('usuario.update', $usuarios->id) }}" method="POST">
            @csrf
            

            {{-- Tipo de Documento --}}
            <div class="mb-3">
                <select name="tipoDocumento" class="form-select form-select-sm" >
                    <option value="Tarjeta De Identidad" 
                        {{ $usuarios->tipoDocumento=='Tarjeta De Identidad'?'selected':'' }}>
                        Tarjeta de Identidad
                    </option>
                    <option value="Cedula De Ciudadania" 
                        {{ $usuarios->tipoDocumento=='Cedula De Ciudadania'?'selected':'' }}>
                        Cédula de Ciudadanía
                    </option>
    
                </select>
            </div>

            {{-- Número de Documento --}}
            <div class="mb-3">
                <input type="number" name="numeroDocumento" class="form-control form-control-sm"
                       value="{{ $usuarios->numeroDocumento }}" placeholder="Número de Documento" >
            </div>

            {{-- Nombre --}}
            <div class="mb-3">
                <input type="text" name="nombre" class="form-control form-control-sm"
                       value="{{ $usuarios->nombre }}" placeholder="Nombre del Usuario" >
            </div>

            {{-- Correo --}}
            <div class="mb-3">
                <input type="email" name="correo" class="form-control form-control-sm"
                       value="{{ $usuarios->correo }}" placeholder="Correo" >
            </div>

            {{-- Teléfono --}}
            <div class="mb-3">
                <input type="number" name="telefono" class="form-control form-control-sm"
                       value="{{ $usuarios->telefono }}" placeholder="Teléfono" >
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
