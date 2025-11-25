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

      <!-- Botón volver a llamar -->
        <form action="{{route('Turno.volverallamar', $turno->id)}}" method="POST" class="mb-3">
    @csrf
    <button type="submit" class="btn btn-success w-100 fw-bold py-2 shadow-sm" 
    onclick="llamarTurno({{ $turno->id }}, '{{ $turno->codigoTurno }}', '{{ $turno->servicio->nombreServicio ?? 'Servicio General' }}', '{{ $turno->servicio->dependencia->nombre ?? 'Dependencia General' }}')"
                                        class="btn btn-sm fw-bold px-3 shadow-sm">
        <i class="bi bi-x-circle"></i> Volver a Llamar
    </button>
</form>

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
<form action="{{ route('Turno.cancelar', $turno->id) }}" method="POST" class="mb-3">
    @csrf
    <button type="submit" class="btn btn-success w-100 fw-bold py-2 shadow-sm">
        <i class="bi bi-x-circle"></i> Cancelar
    </button>
</form>


        <!-- Volver -->
        <div class="mt-4">
            <a href="{{ route('Turno.listar') }}"
                class="btn btn-secondary fw-bold shadow-sm">
                <i class="bi bi-arrow-left-circle"></i> Volver
            </a>
        </div>
    </div>

</div>

<!-- Audio para el sonido de llamado -->
<audio id="llamadoAudio" preload="auto">
    <!-- No necesitamos sources si vamos a usar sonido por defecto -->
</audio>
@endsection

@push('scripts')
<script>
    // Audio element
    const llamadoAudio = document.getElementById('llamadoAudio');

    // Función para llamar el turno - DEFINIDA GLOBALMENTE
    window.llamarTurno = function(turnoId, codigoTurno, servicio, dependencia) {
        console.log('Llamando turno:', codigoTurno);

        const turnoData = {
            codigoTurno: codigoTurno,
            servicio: servicio,
            dependencia: dependencia,
            timestamp: new Date().getTime()
        };

        console.log('Guardando turno en localStorage:', turnoData);

        // Guardar en localStorage para que el tablero lo detecte
        localStorage.setItem('ultimoTurnoLlamado', JSON.stringify(turnoData));

        // También en sessionStorage por seguridad
        sessionStorage.setItem('turnoLlamadoReciente', JSON.stringify(turnoData));

        // Reproducir sonido
        playLlamadoSound();

        // Mostrar mensaje de confirmación
        alert('✅ Turno ' + codigoTurno + ' llamado nuevamente!');

        // Redirigir al tablero después de un breve delay para que el sonido se reproduzca
        setTimeout(() => {
            window.location.href = `/turnos/llamar/${turnoId}`;
        }, 1000);
    }

    // Función para reproducir sonido
    function playLlamadoSound() {
        // Usar el API de audio del navegador para generar sonido
        playFallbackSound();
    }

    // Sonido de fallback usando el API de audio
    function playFallbackSound() {
        try {
            const context = new (window.AudioContext || window.webkitAudioContext)();

            // Crear tres tonos sucesivos (como un beep-beep-beep) - cada uno de 4 segundos
            beep(context, 800, 4000);  // Primer tono - 4 segundos
            setTimeout(() => beep(context, 600, 4000), 5000);  // Segundo tono - 4 segundos, inicia después del primero
            setTimeout(() => beep(context, 1000, 4000), 10000);  // Tercer tono - 4 segundos, inicia después del segundo

        } catch (e) {
            console.log('No se pudo reproducir sonido:', e);
            // Fallback final: solo un alert de consola
            console.log('🔊 Sonido de llamado para turno');
        }
    }

    // Función auxiliar para generar un beep
    function beep(context, frequency, duration) {
        const oscillator = context.createOscillator();
        const gainNode = context.createGain();

        oscillator.connect(gainNode);
        gainNode.connect(context.destination);

        oscillator.frequency.value = frequency;
        oscillator.type = 'sine';

        gainNode.gain.setValueAtTime(0, context.currentTime);
        gainNode.gain.linearRampToValueAtTime(0.3, context.currentTime + 0.01);
        gainNode.gain.exponentialRampToValueAtTime(0.01, context.currentTime + duration/1000);

        oscillator.start(context.currentTime);
        oscillator.stop(context.currentTime + duration/1000);
    }

    // Asegurarnos de que la función esté disponible globalmente
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Script de turnos pendientes cargado correctamente');
    });
</script>
@endpush
