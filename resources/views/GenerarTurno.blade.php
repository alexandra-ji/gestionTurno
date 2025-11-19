<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Turno - Teclado Virtual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4cc9f0;
            --success-color: #4bb543;
            --light-bg: #f8f9fa;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .card-container {
            max-width: 600px;
            margin: 2rem auto;
        }

        .header-card {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: 12px 12px 0 0;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-card {
            border-radius: 0 0 12px 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border: none;
            padding: 2rem;
        }

        .virtual-keyboard {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            margin-top: 1.5rem;
        }

        .keyboard-row {
            display: flex;
            justify-content: center;
            margin-bottom: 0.75rem;
        }

        .keyboard-key {
            width: 60px;
            height: 60px;
            margin: 0 0.5rem;
            border: none;
            border-radius: 8px;
            background: #f8f9fa;
            font-size: 1.5rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .keyboard-key:hover {
            background: #e9ecef;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .keyboard-key:active {
            transform: translateY(0);
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .keyboard-key.number {
            background: white;
            border: 2px solid #dee2e6;
        }

        .keyboard-key.action {
            background: #6c757d;
            color: white;
        }

        .keyboard-key.clear {
            background: #dc3545;
            color: white;
        }

        .keyboard-key.enter {
            background: var(--primary-color);
            color: white;
        }

        .document-input-container {
            position: relative;
        }

        .virtual-keyboard-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #6c757d;
            cursor: pointer;
        }

        .keyboard-instruction {
            font-size: 0.9rem;
            color: #6c757d;
            text-align: center;
            margin-top: 1rem;
        }

        .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.25rem rgba(76, 201, 240, 0.25);
        }

        .btn-primary {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: 8px;
            padding: 0.75rem;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.4);
        }

        .footer {
            text-align: center;
            margin-top: 2rem;
            color: #6c757d;
            font-size: 0.9rem;
        }

        @media (max-width: 576px) {
            .keyboard-key {
                width: 50px;
                height: 50px;
                margin: 0 0.25rem;
                font-size: 1.25rem;
            }

            .keyboard-row {
                margin-bottom: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container card-container">
        <!-- Encabezado -->
        <div class="header-card">
            <h1 class="mb-2"><i class="bi bi-ticket-perforated"></i> Generar Turno</h1>
            <p class="mb-0">Ingrese su documento usando el teclado virtual</p>
        </div>

        <!-- Formulario -->
        <div class="card form-card">
            <form action="{{ route('turno.generar')}}" method="POST" id="turnoForm">
                @csrf

                <!-- Campo de documento con teclado virtual -->
                <div class="mb-4">
                    <label for="documento" class="form-label">
                        <i class="bi bi-person-badge"></i> Número de Documento
                    </label>
                    <div class="document-input-container">
                        <input type="text" class="form-control @error('documento') is-invalid @enderror"
                               id="documento" name="documento" placeholder="Haga clic en el teclado virtual"
                               readonly>
                        <button type="button" class="virtual-keyboard-toggle" id="keyboardToggle">
                            <i class="bi bi-keyboard"></i>
                        </button>
                    </div>
                    @error('documento')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="info-text">
                        Use el teclado virtual para ingresar su documento
                    </div>
                </div>

                <!-- Dependencia -->
                <div class="mb-4">
                    <label for="dependencia" class="form-label">
                        <i class="bi bi-building"></i> Dependencia
                    </label>
                    <select class="form-select @error('dependencia') is-invalid @enderror"
                            id="dependencia" name="dependencia" required>
                        <option value="">Seleccione una dependencia</option>
                        @foreach($dependencias as $dep)
                            <option value="{{ $dep->id }}" {{ old('dependencia') == $dep->id ? 'selected' : '' }}>
                                {{ $dep->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('dependencia')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Teclado Virtual -->
                <div class="virtual-keyboard" id="virtualKeyboard">
                    <div class="keyboard-row">
                        <button type="button" class="keyboard-key number" data-key="1">1</button>
                        <button type="button" class="keyboard-key number" data-key="2">2</button>
                        <button type="button" class="keyboard-key number" data-key="3">3</button>
                    </div>
                    <div class="keyboard-row">
                        <button type="button" class="keyboard-key number" data-key="4">4</button>
                        <button type="button" class="keyboard-key number" data-key="5">5</button>
                        <button type="button" class="keyboard-key number" data-key="6">6</button>
                    </div>
                    <div class="keyboard-row">
                        <button type="button" class="keyboard-key number" data-key="7">7</button>
                        <button type="button" class="keyboard-key number" data-key="8">8</button>
                        <button type="button" class="keyboard-key number" data-key="9">9</button>
                    </div>
                    <div class="keyboard-row">
                        <button type="button" class="keyboard-key action" data-key="backspace">
                            <i class="bi bi-backspace"></i>
                        </button>
                        <button type="button" class="keyboard-key number" data-key="0">0</button>
                        <button type="button" class="keyboard-key clear" data-key="clear">
                            <i class="bi bi-x-circle"></i>
                        </button>
                    </div>
                    <div class="keyboard-instruction">
                        <i class="bi bi-info-circle"></i> Haga clic en los números para ingresar su documento
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2 mt-3">
                    <i class="bi bi-ticket-perforated"></i> Generar Turno
                </button>
            </form>
        </div>

        <div class="footer">
            <p>Sistema de Turnos &copy; {{ date('Y') }}</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const documentoInput = document.getElementById('documento');
            const keyboardToggle = document.getElementById('keyboardToggle');
            const virtualKeyboard = document.getElementById('virtualKeyboard');
            const keyboardKeys = document.querySelectorAll('.keyboard-key');

            // Mostrar/ocultar teclado virtual
            keyboardToggle.addEventListener('click', function() {
                virtualKeyboard.style.display = virtualKeyboard.style.display === 'none' ? 'block' : 'none';
                updateToggleIcon();
            });

            // Actualizar ícono del botón de teclado
            function updateToggleIcon() {
                const icon = keyboardToggle.querySelector('i');
                if (virtualKeyboard.style.display === 'none') {
                    icon.className = 'bi bi-keyboard';
                } else {
                    icon.className = 'bi bi-keyboard-fill';
                }
            }

            // Manejar clics en las teclas del teclado virtual
            keyboardKeys.forEach(key => {
                key.addEventListener('click', function() {
                    const keyValue = this.getAttribute('data-key');

                    switch(keyValue) {
                        case 'backspace':
                            // Eliminar último carácter
                            documentoInput.value = documentoInput.value.slice(0, -1);
                            break;
                        case 'clear':
                            // Limpiar todo el campo
                            documentoInput.value = '';
                            break;
                        default:
                            // Agregar número (máximo 15 caracteres)
                            if (documentoInput.value.length < 15) {
                                documentoInput.value += keyValue;
                            }
                            break;
                    }

                    // Efecto visual al presionar tecla
                    this.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 100);
                });
            });

            // Permitir entrada desde teclado físico también
            documentoInput.addEventListener('focus', function() {
                this.removeAttribute('readonly');
                virtualKeyboard.style.display = 'block';
                updateToggleIcon();
            });

            documentoInput.addEventListener('blur', function() {
                // No volver a poner readonly para permitir correcciones manuales
            });

            // Validar que solo se ingresen números desde teclado físico
            documentoInput.addEventListener('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
            });

            // Inicializar estado del teclado
            virtualKeyboard.style.display = 'block';
            updateToggleIcon();
        });
    </script>
</body>
</html>e
