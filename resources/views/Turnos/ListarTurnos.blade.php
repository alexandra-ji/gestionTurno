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




    @endsection



    @section('scripts')
    <script>
        // Función para llamar el turno y guardar en localStorage
        function llamarTurno() {
            const turnoData = {
                codigoTurno: "{{ $turno->codigoTurno }}",
                servicio: "{{ $turno->servicio->nombreServicio ?? 'Servicio General' }}",
                dependencia: "{{ $turno->servicio->dependencia->nombre ?? 'Dependencia General' }}",
                timestamp: new Date().getTime()
            };

            console.log('Guardando turno en localStorage:', turnoData);

            // Guardar en localStorage para que el tablero lo detecte
            localStorage.setItem('ultimoTurnoLlamado', JSON.stringify(turnoData));

            // También en sessionStorage por seguridad
            sessionStorage.setItem('turnoLlamadoReciente', JSON.stringify(turnoData));

            // Mostrar mensaje de confirmación
            alert('✅ Turno {{ $turno->codigoTurno }} llamado exitosamente!');

            // Redirigir al tablero
            window.location.href = "{{ route('TableroTurno') }}";
        }

        // Llamar automáticamente la función cuando se carga la página
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Página de llamar turno cargada - ejecutando llamado automático');
            llamarTurno();
        });
    </script>
    @endsection