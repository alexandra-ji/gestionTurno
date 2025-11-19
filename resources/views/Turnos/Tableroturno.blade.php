<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablero de Turnos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --success-color: #4bb543;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
            --info-color: #17a2b8;
        }

        body {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            overflow-x: hidden;
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

        .left-panel {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            height: 100%;
        }

        .services-panel {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            height: 100%;
        }

        .waiting-turns-section {
            margin-top: 0;
        }

        .waiting-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--primary-color);
        }

        .waiting-count {
            background: var(--primary-color);
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
            background: var(--warning-color);
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
            color: var(--primary-color);
        }

        .service-badge {
            background: var(--info-color);
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
            border-left: 5px solid var(--success-color);
            transition: all 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .service-name {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
        }

        .current-turn-display {
            background: linear-gradient(135deg, var(--success-color), #3a9d5d);
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
            color: var(--primary-color);
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

        .status-badge {
            display: inline-block;
            padding: 0.4rem 1rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .status-called {
            background-color: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }

        .section-title {
            border-left: 4px solid var(--primary-color);
            padding-left: 1rem;
            margin: 0 0 1rem 0;
            color: #333;
            font-weight: 600;
        }

        .empty-state {
            text-align: center;
            padding: 2rem;
            color: #6c757d;
            background: #f8f9fa;
            border-radius: 12px;
            border: 2px dashed #dee2e6;
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #dee2e6;
        }

        .dependency-info {
            font-size: 0.9rem;
            color: #6c757d;
            margin-top: 0.25rem;
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
            animation: fadeIn 0.3s ease-in;
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

        .popup-header h3 {
            margin: 0;
            font-size: 2rem;
        }

        .popup-turno {
            font-size: 5rem;
            font-weight: 900;
            margin: 2rem 0;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.3);
            animation: pulse 0.8s infinite;
        }

        .popup-servicio {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .popup-dependencia {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 1.5rem;
        }

        .popup-footer {
            border-top: 1px solid rgba(255,255,255,0.3);
            padding-top: 1rem;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
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
            .turn-display {
                font-size: 3rem;
            }

            .called-turn {
                font-size: 2rem;
            }

            .clock-display {
                font-size: 2rem;
            }

            .waiting-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }

            .service-info {
                text-align: left;
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
            <div class="col-lg-6 mb-4">
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
                                            <div class="dependency-info">
                                                {{ $turnoEspera->servicio->dependencia->nombre ?? 'N/A' }}
                                            </div>
                                            <div class="small">
                                                Generado: {{ \Carbon\Carbon::parse($turnoEspera->created_at)->format('H:i') }}
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
            <div class="col-lg-6 mb-4">
                <div class="services-panel">
                    <h3 class="section-title"><i class="bi bi-megaphone-fill"></i> En Progreso</h3>

                    @if($turnosLlamados->count() > 0)
                        @foreach($turnosLlamados as $turnoLlamado)
                            <div class="service-card">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <div class="service-name">
                                        <i class="bi bi-person-check-fill text-success"></i>
                                        {{ $turnoLlamado->servicio->nombreServicio ?? 'Servicio General' }}
                                    </div>
                                    <span class="status-badge status-called">
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

                                <div class="mt-2 small text-muted">
                                    <i class="bi bi-person"></i> ID Usuario: {{ $turnoLlamado->idUsuario }}
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

                    <!-- Aviso de actualización automática -->
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

    <!-- Meta tag para actualización automática -->
    <meta http-equiv="refresh" content="30">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Reloj en tiempo real
        function actualizarReloj() {
            const ahora = new Date();
            document.getElementById('currentTime').textContent = ahora.toLocaleTimeString('es-ES');
        }

        // Función para mostrar el popup del turno llamado
        function mostrarTurnoLlamado(codigoTurno, servicio, dependencia) {
            const popup = document.getElementById('turnoPopup');
            const turnoNumber = document.getElementById('popupTurnoNumber');
            const servicioElement = document.getElementById('popupServicio');
            const dependenciaElement = document.getElementById('popupDependencia');
            const countdownElement = document.getElementById('popupCountdown');

            // Actualizar contenido
            turnoNumber.textContent = codigoTurno;
            servicioElement.textContent = servicio;
            dependenciaElement.textContent = dependencia;

            // Mostrar popup
            popup.style.display = 'flex';

            // Contador regresivo
            let seconds = 10;
            countdownElement.textContent = seconds;

            const countdown = setInterval(() => {
                seconds--;
                countdownElement.textContent = seconds;

                if (seconds <= 0) {
                    clearInterval(countdown);
                    popup.style.display = 'none';
                }
            }, 1000);
        }

        // Verificar si hay un turno llamado reciente
        function verificarTurnoLlamado() {
            // Verificar en localStorage
            const turnoLlamado = localStorage.getItem('ultimoTurnoLlamado');

            if (turnoLlamado) {
                const turnoData = JSON.parse(turnoLlamado);

                // Mostrar el popup
                mostrarTurnoLlamado(
                    turnoData.codigoTurno,
                    turnoData.servicio,
                    turnoData.dependencia
                );

                // Limpiar el localStorage después de mostrar
                localStorage.removeItem('ultimoTurnoLlamado');
                return;
            }

            // También verificar en sessionStorage
            const turnoSession = sessionStorage.getItem('turnoLlamadoReciente');
            if (turnoSession) {
                const turnoData = JSON.parse(turnoSession);

                mostrarTurnoLlamado(
                    turnoData.codigoTurno,
                    turnoData.servicio,
                    turnoData.dependencia
                );

                sessionStorage.removeItem('turnoLlamadoReciente');
            }
        }

        // Inicializar cuando la página cargue
        document.addEventListener('DOMContentLoaded', function() {
            // Iniciar reloj
            actualizarReloj();
            setInterval(actualizarReloj, 1000);

            // Verificar turnos llamados después de un breve delay
            setTimeout(verificarTurnoLlamado, 500);
        });

        // También verificar periódicamente por si acaso
        setInterval(verificarTurnoLlamado, 2000);
    </script>


<script>
    function llamarTurno() {
        const turnoData = {
            codigoTurno: "{{ $turno->codigoTurno }}",
            servicio: "{{ $turno->servicio->nombreServicio ?? 'Servicio General' }}",
            dependencia: "{{ $turno->servicio->dependencia->nombre ?? 'Dependencia General' }}",
            timestamp: new Date().getTime()
        };

        console.log('Guardando turno:', turnoData);
        localStorage.setItem('ultimoTurnoLlamado', JSON.stringify(turnoData));
        sessionStorage.setItem('turnoLlamadoReciente', JSON.stringify(turnoData));

        alert('✅ Turno {{ $turno->codigoTurno }} llamado!');
        window.location.href = "{{ route('TableroTurno') }}";
    }

    document.addEventListener('DOMContentLoaded', function() {
        llamarTurno();
    });
</script>




</body>
</html>
