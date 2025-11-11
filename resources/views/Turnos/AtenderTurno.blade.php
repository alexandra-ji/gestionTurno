@extends('layouts.app')

@section('title', 'Atender Turno')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white text-center">
            <h4>Atendiendo al Cliente</h4>
        </div>

        <div class="card-body">
            <!-- Información del cliente -->
            <div class="mb-4">
                <h5 class="text-secondary mb-3">Datos del Cliente</h5>

                <p><strong>Documento:</strong> {{ $turno->usuario->numeroDocumento?? 'No disponible' }}</p>
                <p><strong>Servicio:</strong> {{ $turno->Servicio->nombreServicio?? 'N/A' }}</p>
                <p><strong>Empleado asignado:</strong> {{ $turno->empleado->nombreCompleto?? 'Sin asignar' }}</p>
                <p><strong>Código de turno:</strong> {{ $turno->codigoTurno }}</p>
            </div>

            <!-- Cronómetro -->
            <div class="text-center my-4">
                <h5 class="text-secondary">⏱️ Tiempo de atención</h5>
                <h2 id="cronometro" class="display-5 fw-bold text-primary">00:00</h2>
            </div>

            <!-- Botón de finalizar -->
            <form id="formFinalizar" action="{{ route('Turno.finalizarAtencion', $turno->id) }}" method="POST" class="text-center">
                @csrf
                <button type="submit" class="btn btn-success btn-lg px-5">
                    ✅Atendido
            </form>
        </div>
    </div>
</div>

<script>
    // Cronómetro simple
    let segundos = 0;
    const cronometro = document.getElementById('cronometro');

    const intervalo = setInterval(() => {
        segundos++;
        let minutos = Math.floor(segundos / 60);
        let seg = segundos % 60;
        cronometro.textContent = `${minutos.toString().padStart(2, '0')}:${seg.toString().padStart(2, '0')}`;
    }, 1000);

    // Detener cronómetro al enviar el formulario
    document.getElementById('formFinalizar').addEventListener('submit', () => clearInterval(intervalo));
</script>
@endsection