@extends('layouts.app')

@section('title', 'Llamar Turno')

@section('content')
<div class="container text-center mt-5">

    <h3 class="fw-bold mb-4">
        Llamando al Turno:
        <span class="text-success">{{ $turno->codigoTurno }}</span>
    </h3>

    <div class="card shadow p-4 mx-auto" style="max-width: 420px; border-radius: 12px;">
        <p class="mb-4 fs-5">Selecciona una acción para este turno:</p>

<!-- Botón Atender -->
<form action="{{ route('Turno.mostrarAtencion', $turno->id) }}" method="POST" class="mb-3">
    @csrf
    <button type="submit" class="btn btn-success w-100 fw-bold py-2 shadow-sm">
        <i class="bi bi-person-check"></i> Atender
    </button>
</form>

<!-- Botón Reasignar -->
<form action="{{ route('Turno.reasignar', $turno->id) }}" method="POST" class="mb-3">
    @csrf
    <button type="submit" class="btn btn-success w-100 fw-bold py-2 shadow-sm">
        <i class="bi bi-arrow-repeat"></i> Reasignar
    </button>
</form>

<!-- Botón Cancelar -->
<form action="{{ route('Turno.atender', $turno->id) }}" method="POST" class="mb-3">
    @csrf
    <button type="submit" class="btn btn-success w-100 fw-bold py-2 shadow-sm">
        <i class="bi bi-x-circle"></i> Cancelar
    </button>
</form>

        <!-- Volver -->
        <div class="mt-4">
            <a href="{{ route('Turno.index') }}"
                class="btn btn-secondary fw-bold shadow-sm">
                <i class="bi bi-arrow-left-circle"></i> Volver
            </a>
        </div>
    </div>

</div>
@endsection
