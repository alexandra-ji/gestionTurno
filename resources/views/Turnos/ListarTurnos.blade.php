@extends('layouts.app')

@section('title', 'Turnos Pendientes y Reasignados')

@section('content_header')

    {{-- TÍTULO DE LA SECCIÓN --}}
    <h3 class="text-center my-4 fw-bold" style="color:#333;">Turnos Pendientes y Reasignados</h3>
    @endsection

    @section('Content')
    <div class="container mb-5">

        {{-- BOTONES SUPERIORES --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <!-- Botón Volver -->
            <a href="{{ route('Turno.index') }}"
                class="btn fw-bold px-4 shadow-sm"
                style="background-color:#333333; color:yellow; border-radius:8px;">
                <i class="bi bi-arrow-left-circle"></i> Volver
            </a>
        </div>
    </div>
</div>

<h3 class="text-center my-4 fw-bold" style="color:#333;">Turnos Pendientes y Reasignados</h3>
@endsection

@section('Content')
<div class="container mb-5">

    {{-- BOTONES SUPERIORES --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <!-- Botón Volver -->
        <a href="{{ route('Turno.index') }}"
            class="btn fw-bold px-4 shadow-sm"
            style="background-color:#333333; color:yellow; border-radius:8px;">
            <i class="bi bi-arrow-left-circle"></i> Volver
        </a>
    </div>

        {{-- TABLA DE TURNOS --}}
        <div class="row">
            <div class="col-12">
                <div class="table-responsive rounded shadow-sm">
                    <table class="table table-bordered align-middle text-center mb-0"
                        style="background-color:white; color:#333;">
                        <thead style="background-color:#a8e6a1; color:#333;">
                            <tr>
                                <th>ID</th>
                                <th>Código Turno</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                                <th>Hora Inicio</th>
                                <th>Hora Fin</th>
                                <th>Usuario</th>
                                <th>Servicio</th>
                                <th>Empleado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($turnos->isEmpty())
                            <tr>
                                <td colspan="10" class="text-center text-muted">
                                    No hay turnos pendientes ni reasignados.
                                </td>
                            </tr>
                            @else
                            @foreach ($turnos as $turno)
                                <tr>
                                    <td>{{ $turno->id }}</td>
                                    <td>{{ $turno->codigoTurno }}</td>
                                    <td>
                                        @if ($turno->estadoTurno == 'Pendiente')
                                            <span class="badge bg-warning text-dark">Pendiente</span>
                                        @elseif ($turno->estadoTurno == 'Reasignado')
                                            <span class="badge bg-info text-dark">Reasignado</span>
                                        @endif
                                    </td>
                                    <td>{{ $turno->fecha }}</td>
                                    <td>{{ $turno->horaInicio ?? '—' }}</td>
                                    <td>{{ $turno->horaFin ?? '—' }}</td>
                                    <td>{{ $turno->usuario->numeroDocumento ?? '—' }}</td>
                                    <td>{{ $turno->servicio->nombreServicio ?? '—' }}</td>
                                    <td>{{ $turno->empleado->nombreCompleto ?? '—' }}</td>

                                    <td class="d-flex justify-content-center gap-2">
                                        <!-- Botón Llamar -->
                                        <button type="button"
                                            onclick="llamarTurno({{ $turno->id }}, '{{ $turno->codigoTurno }}', '{{ $turno->servicio->nombreServicio ?? 'Servicio General' }}', '{{ $turno->servicio->dependencia->nombre ?? 'Dependencia General' }}')"
                                            class="btn btn-sm fw-bold px-3 shadow-sm"
                                            style="background-color:#ffc107; color:#333; border-radius:6px;">
                                            Llamar
                                        </button>
                                    </td>
                                </tr>
                            <tr>
                                <td>{{ $turno->id }}</td>
                                <td>{{ $turno->codigoTurno }}</td>
                                <td>
                                    @if ($turno->estadoTurno == 'Pendiente')
                                    <span class="badge bg-warning text-dark">Pendiente</span>

                                    @elseif ($turno->estadoTurno == 'Reasignado')
                                    <span class="badge bg-info text-dark">Reasignado</span>

                                    @elseif ($turno->estadoTurno == 'Cancelado')
                                    <span class="badge bg-red text-dark">Cancelado</span>
                                    @endif
                                </td>

                                <td>{{ $turno->fecha }}</td>
                                <td>{{ $turno->horaInicio ?? '—' }}</td>
                                <td>{{ $turno->horaFin ?? '—' }}</td>
                                <td>{{ $turno->usuario->numeroDocumento ?? '—' }}</td>
                                <td>{{ $turno->servicio->nombreServicio ?? '—' }}</td>
                                <td>{{ $turno->empleado->nombreCompleto ?? '—' }}</td>

                                <td class="d-flex justify-content-center gap-2">
                                    <!-- Botón Llamar -->
                                    <a href="{{ route('Turno.llamar', $turno->id) }}"
                                        class="btn btn-sm fw-bold px-3 shadow-sm"
                                        style="background-color:#ffc107; color:#333; border-radius:6px;">
                                        Llamar
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Audio para el sonido de llamado -->
<audio id="llamadoAudio" preload="auto">
    <!-- No necesitamos sources si vamos a usar sonido por defecto -->
</audio>


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
        alert('✅ Turno ' + codigoTurno + ' llamado exitosamente!');

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

                // Crear tres tonos sucesivos (como un beep-beep-beep) - cada uno de 6 segundos
                beep(context, 800, 4000);  // Primer tono - 6 segundos
                setTimeout(() => beep(context, 600, 4000), 7000);  // Segundo tono - 6 segundos, inicia después del primero
                setTimeout(() => beep(context, 1000, 4000), 14000);  // Tercer tono - 6 segundos, inicia después del segundo

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
