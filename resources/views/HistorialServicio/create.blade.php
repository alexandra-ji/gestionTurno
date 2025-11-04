@extends('layouts.app')

@section('title', 'Crear historialServicio')

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
            <h5 class="fw-bold text-dark">HistorialServicios</h5>
        </div>

        <form action="{{route('Historial.store')}}" method="POST">
            @csrf

            {{-- Fecha Salida--}}
            <div class="mb-3">
                <label for="fechaSalida" class="form-label  @error('fechaSalida') is-invalid @enderror">Fecha Salida</label>
                <input type="datetime-local" class="form-control" id="fechaSalida" name="fechaSalida">
                 @error('fechaSalida')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
           

            <div>
                <label for="idTurno" class="form-label   @error('idTurno') is-invalid @enderror">Turno</label>
                <select name="idTurno" id="idTurno" class="form-select">
                    <option value="">Seleccione un Turno</option>
                    @foreach($turnos as $turno)
                    <option value="{{$turno->id}}">{{$turno->codigoTurno}}</option>
                    @endforeach
                </select>

                @error('idTurno')
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
                <a href="{{ route('Historial.index') }}"
                    class="btn btn-link text-decoration-none text-danger fw-semibold">
                    ← Volver
                </a>
            </div>
        </form>

    </div>
</div>
@endsection