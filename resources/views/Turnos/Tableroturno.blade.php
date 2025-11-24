<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablero de Turnos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        /* ESTILOS SIMPLIFICADOS Y CORREGIDOS */
        body {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .dashboard-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 1rem;
        }

        .header {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .left-panel, .services-panel {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            height: 100%;
            margin-bottom: 2rem;
        }

        .waiting-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #4361ee;
        }

        .waiting-count {
            background: #4361ee;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-weight: 600;
        }

        .waiting-list {
            max-height: 500px;
            overflow-y: auto;
        }

        .waiting-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            border-bottom: 1px solid #eee;
            border-radius: 8px;
            margin-bottom: 0.5rem;
            background: #f8f9fa;
            transition: all 0.3s ease;
        }

        .waiting-item:hover {
            background: #e9ecef;
            transform: translateX(5px);
        }

        .turn-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .position {
            background: #ffc107;
            color: white;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .turn-number {
            font-size: 1.5rem;
            font-weight: 700;
            color: #4361ee;
        }

        .service-badge {
            background: #17a2b8;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .service-info {
            text-align: right;
            font-size: 0.9rem;
            color: #6c757d;
        }

        .service-card {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border-left: 5px solid #4bb543;
            transition: all 0.3s ease;
        }

        .current-turn-display {
            background: linear-gradient(135deg, #4bb543, #3a9d5d);
            color: white;
            border-radius: 12px;
            padding: 1.5rem;
            text-align: center;
            margin: 1rem 0;
        }

        .called-turn {
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0.5rem 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .clock-display {
            font-size: 3rem;
            font-weight: 700;
            color: #4361ee;
            text-align: center;
            margin: 1rem 0;
            font-family: 'Courier New', monospace;
        }

        .date-display {
            font-size: 1.2rem;
            color: #6c757d;
            text-align: center;
            margin-bottom: 1rem;
        }

        .empty-state {
            text-align: center;
            padding: 2rem;
            color: #6c757d;
            background: #f8f9fa;
            border-radius: 12px;
            border: 2px dashed #dee2e6;
        }

        .auto-refresh-notice {
            background: #d1ecf1;
            border: 1px solid #bee5eb;
            border-radius: 8px;
            padding: 0.75rem;
            text-align: center;
            margin-top: 1rem;
            font-size: 0.9rem;
            color: #0c5460;
        }

        /* Estilos para la ventana emergente */
        .turno-popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .popup-content {
            background: linear-gradient(135deg, #4361ee, #3a0ca3);
            color: white;
            border-radius: 20px;
            padding: 3rem;
            text-align: center;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
            border: 8px solid #fff;
            max-width: 600px;
            width: 90%;
            animation: popIn 0.5s ease-out;
        }

        .popup-turno {
            font-size: 5rem;
            font-weight: 900;
            margin: 2rem 0;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.3);
            animation: pulse 0.8s infinite;
        }

        @keyframes popIn {
            0% { transform: scale(0.5); opacity: 0; }
            70% { transform: scale(1.1); }
            100% { transform: scale(1); opacity: 1; }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        @media (max-width: 768px) {
            .called-turn {
                font-size: 2rem;
            }

            .clock-display {
                font-size: 2rem;
            }

            .popup-turno {
                font-size: 3rem;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Encabezado -->
        <div class="header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="mb-2"><i class="bi bi-display"></i> Tablero de Turnos</h1>
                    <p class="mb-0 text-muted">Sistema de gestión y visualización de turnos</p>
                </div>
                <div class="col-md-6 text-end">
                    <div class="date-display" id="currentDate">{{ now()->format('l, d F Y') }}</div>
                    <div class="clock-display" id="currentTime">{{ now()->format('H:i:s') }}</div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Columna Izquierda: Turnos en Espera -->
            <div class="col-lg-6">
                <div class="left-panel">
                    <div class="waiting-turns-section">
                        <div class="waiting-header">
                            <h4 class="mb-0"><i class="bi bi-list-ul"></i> Turnos en Espera</h4>
                            <span class="waiting-count">{{ $turnosEnEspera->count() }}</span>
                        </div>

                        <div class="waiting-list">
                            @if($turnosEnEspera->count() > 0)
                                @foreach($turnosEnEspera as $index => $turnoEspera)
                                    <div class="waiting-item">
                                        <div class="turn-info">
                                            <div class="position">{{ $index + 1 }}</div>
                                            <div class="turn-number">{{ $turnoEspera->codigoTurno }}</div>
                                            <span class="service-badge">
                                                {{ substr($turnoEspera->codigoTurno, 0, 1) }}
                                            </span>
                                        </div>
                                        <div class="service-info">
                                            <div><strong>{{ $turnoEspera->servicio->nombreServicio ?? 'N/A' }}</strong></div>
                                            <div class="small">
                                                {{ $turnoEspera->servicio->dependencia->nombre ?? 'N/A' }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="empty-state">
                                    <i class="bi bi-hourglass-split"></i>
                                    <p>No hay turnos en espera</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Columna Derecha: En Progreso -->
            <div class="col-lg-6">
                <div class="services-panel">
                    <h4 class="mb-3"><i class="bi bi-megaphone-fill"></i> En Progreso</h4>

                    @if($turnosLlamados->count() > 0)
                        @foreach($turnosLlamados as $turnoLlamado)
                            <div class="service-card">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <div class="service-name">
                                        <i class="bi bi-person-check-fill text-success"></i>
                                        {{ $turnoLlamado->servicio->nombreServicio ?? 'Servicio General' }}
                                    </div>
                                    <span class="badge bg-info text-dark">
                                        <i class="bi bi-clock-history"></i> En Atención
                                    </span>
                                </div>

                                <div class="current-turn-display">
                                    <div class="mb-2">Turno Actual</div>
                                    <div class="called-turn">{{ $turnoLlamado->codigoTurno }}</div>
                                    <div class="small mt-2">
                                        <div><i class="bi bi-building"></i> {{ $turnoLlamado->servicio->dependencia->nombre ?? 'Dependencia General' }}</div>
                                        <div><i class="bi bi-clock"></i> Iniciado: {{ \Carbon\Carbon::parse($turnoLlamado->updated_at)->format('H:i') }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="empty-state">
                            <i class="bi bi-megaphone text-muted" style="font-size: 3rem;"></i>
                            <h5>No hay turnos en atención</h5>
                            <p class="mb-0">Todos los servicios están disponibles</p>
                        </div>
                    @endif

                    <div class="auto-refresh-notice">
                        <i class="bi bi-arrow-clockwise"></i>
                        La página se actualiza automáticamente cada 30 segundos
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ventana emergente para turno llamado -->
    <div id="turnoPopup" class="turno-popup">
        <div class="popup-content">
            <div class="popup-header">
                <h3><i class="bi bi-megaphone-fill"></i> ¡Turno Llamado!</h3>
            </div>
            <div class="popup-body">
                <div class="popup-turno" id="popupTurnoNumber">A-001</div>
                <div class="popup-servicio" id="popupServicio">Servicio</div>
                <div class="popup-dependencia" id="popupDependencia">Dependencia</div>
            </div>
            <div class="popup-footer">
                <small>Esta ventana se cerrará automáticamente en <span id="popupCountdown">10</span> segundos</small>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Variables de control
        let popupAlreadyShown = false;

        // Reloj en tiempo real
        function actualizarReloj() {
            const ahora = new Date();
            document.getElementById('currentTime').textContent = ahora.toLocaleTimeString('es-ES');
        }

        // Función para reproducir sonido de llamado
        function playLlamadoSound() {
            try {
                const context = new (window.AudioContext || window.webkitAudioContext)();

                // Crear tres tonos sucesivos
                beep(context, 800, 200);
                setTimeout(() => beep(context, 600, 200), 300);
                setTimeout(() => beep(context, 1000, 300), 600);

            } catch (e) {
                console.log('No se pudo reproducir sonido:', e);
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

        // Función para mostrar el popup del turno llamado
        function mostrarTurnoLlamado(codigoTurno, servicio, dependencia) {
            if (popupAlreadyShown) return;

            const popup = document.getElementById('turnoPopup');
            const turnoNumber = document.getElementById('popupTurnoNumber');
            const servicioElement = document.getElementById('popupServicio');
            const dependenciaElement = document.getElementById('popupDependencia');
            const countdownElement = document.getElementById('popupCountdown');

            // Actualizar contenido
            turnoNumber.textContent = codigoTurno;
            servicioElement.textContent = servicio;
            dependenciaElement.textContent = dependencia;

            // Reproducir sonido
            playLlamadoSound();

            // Mostrar popup
            popup.style.display = 'flex';
            popupAlreadyShown = true;

            // Contador regresivo
            let seconds = 10;
            countdownElement.textContent = seconds;

            const countdown = setInterval(() => {
                seconds--;
                countdownElement.textContent = seconds;

                if (seconds <= 0) {
                    clearInterval(countdown);
                    popup.style.display = 'none';

                    // Permitir mostrar popup nuevamente después de 2 segundos
                    setTimeout(() => {
                        popupAlreadyShown = false;
                    }, 2000);
                }
            }, 1000);
        }

        // Verificar si hay un turno llamado reciente
        function verificarTurnoLlamado() {
            // Verificar en localStorage
            const turnoLlamado = localStorage.getItem('ultimoTurnoLlamado');
            if (turnoLlamado && !popupAlreadyShown) {
                const turnoData = JSON.parse(turnoLlamado);

                // Verificar que no sea muy viejo (menos de 5 segundos)
                const ahora = new Date().getTime();
                if (ahora - turnoData.timestamp < 5000) {
                    mostrarTurnoLlamado(
                        turnoData.codigoTurno,
                        turnoData.servicio,
                        turnoData.dependencia
                    );
                }

                // Limpiar el localStorage después de mostrar
                localStorage.removeItem('ultimoTurnoLlamado');
                return;
            }

            // También verificar en sessionStorage
            const turnoSession = sessionStorage.getItem('turnoLlamadoReciente');
            if (turnoSession && !popupAlreadyShown) {
                const turnoData = JSON.parse(turnoSession);

                const ahora = new Date().getTime();
                if (ahora - turnoData.timestamp < 5000) {
                    mostrarTurnoLlamado(
                        turnoData.codigoTurno,
                        turnoData.servicio,
                        turnoData.dependencia
                    );
                }

                sessionStorage.removeItem('turnoLlamadoReciente');
            }
        }

        // Inicializar cuando la página cargue
        document.addEventListener('DOMContentLoaded', function() {
            // Iniciar reloj
            actualizarReloj();
            setInterval(actualizarReloj, 1000);

            // Verificar turnos llamados inmediatamente
            verificarTurnoLlamado();

            // Verificar periódicamente cada segundo
            setInterval(verificarTurnoLlamado, 1000);
        });
    </script>
