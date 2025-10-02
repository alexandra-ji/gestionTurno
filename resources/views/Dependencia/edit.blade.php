@extends('layouts.app')

@section('title', 'Editar Dependencia')

@section('Content')
<div class="d-flex justify-content-center align-items-center" style="min-height:100vh; background:#f7f7f7;">
    <div class="p-4 shadow" style="width:420px; background:white; border-radius:8px;">

        {{-- Encabezado estilo GestionTurnos --}}
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
            <h5 class="fw-bold text-dark">EDITAR DEPENDENCIA</h5>
        </div>

        <form action="{{route('dependencia.update', $dependencias->id)}}" method="POST">
            @csrf
            

               {{-- Nombre De La Dependencia--}}
            <div class="mb-3">
                <input type="text" name="nombre" class="form-control form-control-sm"
                value="{{ $dependencias->nombre }}"
                       placeholder="Nombre de la Dependencia" required>
            {{-- Nombre --}}
            <div class="mb-3">
                <input type="text" name="descripcion" class="form-control form-control-sm"
                       value="{{ $dependencias->descripcion }}" placeholder="Descripcion de la Dependencia" required>
            </div>
            {{-- Botón Guardar --}}
            <div class="d-grid">
                <button type="submit" class="btn btn-success btn-sm py-2 fw-bold">
                    GUARDAR 
                </button>
            </div>

            {{-- Botón Volver --}}
            <div class="text-center mt-3">
                <a href="{{ route('dependencia.index') }}"
                   class="btn btn-link text-decoration-none text-danger fw-semibold">
                    ← Volver
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
