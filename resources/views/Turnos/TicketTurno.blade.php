<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket de Turno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --success-color: #4bb543;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 2rem 0;
        }

        .ticket-container {
            max-width: 400px;
            margin: 0 auto;
        }

        .ticket {
            background: white;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
        }

        .ticket-header {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 1.5rem;
            text-align: center;
            position: relative;
        }

        .ticket-header::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            right: 0;
            height: 20px;
            background: white;
            border-radius: 50%;
        }

        .ticket-body {
            padding: 2rem 1.5rem 1.5rem;
        }

        .ticket-number {
            font-size: 3.5rem;
            font-weight: 800;
            text-align: center;
            color: var(--primary-color);
            margin: 1rem 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .ticket-info {
            margin-bottom: 1.5rem;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 0.75rem 0;
            border-bottom: 1px dashed #dee2e6;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            font-weight: 600;
            color: #6c757d;
        }

        .info-value {
            font-weight: 500;
            text-align: right;
        }

        .status-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .ticket-footer {
            background: #f8f9fa;
            padding: 1.5rem;
            text-align: center;
            border-top: 2px dashed #dee2e6;
        }

        .barcode {
            text-align: center;
            margin: 1.5rem 0;
            padding: 1rem;
            background: white;
            border-radius: 8px;
        }

        .barcode-line {
            display: inline-block;
            height: 60px;
            width: 3px;
            background: #333;
            margin: 0 1px;
        }

        .barcode-number {
            font-family: 'Courier New', monospace;
            font-size: 1.1rem;
            letter-spacing: 5px;
            margin-top: 0.5rem;
        }

        .instructions {
            background: #e7f1ff;
            border-left: 4px solid var(--primary-color);
            padding: 1rem;
            margin: 1.5rem 0;
            border-radius: 0 8px 8px 0;
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn-ticket {
            flex: 1;
            border-radius: 8px;
            padding: 0.75rem;
            font-weight: 600;
            transition: all 0.3s;
        }

        .perforation {
            position: absolute;
            left: 20px;
            width: calc(100% - 40px);
            height: 1px;
            background: repeating-linear-gradient(
                to right,
                transparent,
                transparent 10px,
                #dee2e6 10px,
                #dee2e6 20px
            );
        }

        .perforation.top {
            top: 0;
        }

        .perforation.bottom {
            bottom: 0;
        }

        .ticket-ribbon {
            position: absolute;
            top: 20px;
            right: -30px;
            background: var(--danger-color);
            color: white;
            padding: 0.5rem 2rem;
            transform: rotate(45deg);
            font-weight: 600;
            font-size: 0.8rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }

            .ticket {
                box-shadow: none;
                border: 1px solid #ddd;
            }

            .action-buttons {
                display: none;
            }

            .no-print {
                display: none;
            }
        }

        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 5rem;
            color: rgba(0, 0, 0, 0.05);
            font-weight: 800;
            z-index: 0;
            pointer-events: none;
        }
    </style>
</head>
<body>
    <div class="container ticket-container">
        <div class="ticket">
            <!-- Marca de agua -->
            <div class="watermark">TURNO</div>

            <!-- Perforaciones -->
            <div class="perforation top"></div>
            <div class="perforation bottom"></div>

            <!-- Ribbon para tickets prioritarios -->
            <!-- <div class="ticket-ribbon">PRIORITARIO</div> -->

            <!-- Encabezado del ticket -->
            <div class="ticket-header">
                <h2 class="mb-2"><i class="bi bi-building"></i> Sistema de Turnos</h2>
                <p class="mb-0">Su turno ha sido generado exitosamente</p>
            </div>

            <!-- Cuerpo del ticket -->
            <div class="ticket-body">
                <!-- Número de turno -->
                <div class="ticket-number" id="turnoNumber">
                    {{ $turno->codigoTurno ?? 'A-001' }}
                </div>

                <!-- Información del turno -->
                <div class="ticket-info">
                    <div class="info-row">
                        <span class="info-label">Fecha:</span>
                        <span class="info-value" id="fechaTurno">{{ date('d/m/Y') }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Hora:</span>
                        <span class="info-value" id="horaTurno">{{ date('H:i') }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">ID Usuario:</span>
                        <span class="info-value" id="idUsuario">{{ $turno->usuario->nombre }}</span>
                    </div>
                </div>

                <!-- Código de barras simulado -->
                <div class="barcode">
                    <div>
                        <span class="barcode-line" style="height:40px"></span>
                        <span class="barcode-line" style="height:60px"></span>
                        <span class="barcode-line" style="height:30px"></span>
                        <span class="barcode-line" style="height:50px"></span>
                        <span class="barcode-line" style="height:70px"></span>
                        <span class="barcode-line" style="height:35px"></span>
                        <span class="barcode-line" style="height:55px"></span>
                        <span class="barcode-line" style="height:45px"></span>
                        <span class="barcode-line" style="height:65px"></span>
                    </div>
                    <div class="barcode-number">{{ $turno->codigoTurno ?? 'A-001' }}</div>
                </div>

                <!-- Instrucciones -->
                <div class="instructions">
                    <h6><i class="bi bi-info-circle"></i> Instrucciones:</h6>
                    <ul class="mb-0 small">
                        <li>Conserve este ticket hasta ser atendido</li>
                        <li>Esté atento a la pantalla de turnos</li>
                        <li>Presente este ticket cuando sea llamado</li>
                    </ul>
                </div>
            </div>

            <!-- Pie del ticket -->
            <div class="ticket-footer">
                <p class="small mb-2">Gracias por su preferencia</p>
                <p class="small text-muted mb-0">Tiempo estimado de espera: <strong>15-20 minutos</strong></p>
            </div>
        </div>

        <!-- Botones de acción -->
        <div class="action-buttons no-print">
            <button class="btn btn-primary btn-ticket" onclick="window.print()">
                <i class="bi bi-printer"></i> Imprimir Ticket
            </button>
            <button class="btn btn-success btn-ticket" id="nuevoTurnoBtn">
                <i class="bi bi-plus-circle"></i> Nuevo Turno
            </button>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Actualizar hora en tiempo real
            function updateTime() {
                const now = new Date();
                document.getElementById('horaTurno').textContent =
                    now.getHours().toString().padStart(2, '0') + ':' +
                    now.getMinutes().toString().padStart(2, '0');
            }

            // Actualizar cada minuto
            updateTime();
            setInterval(updateTime, 60000);

            // Botón para nuevo turno
            document.getElementById('nuevoTurnoBtn').addEventListener('click', function() {
                    window.location.href = '/generar-turno';
            });

            // Efecto de impresión automática (opcional)
            // setTimeout(() => {
            //     if(confirm('¿Desea imprimir el ticket?')) {
            //         window.print();
            //     }
            // }, 1000);
        });
    </script>
</body>
</html>
