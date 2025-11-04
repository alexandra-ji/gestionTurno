<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistorialServicioRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para realizar esta solicitud.
     */
    public function authorize(): bool
    {
        return true; // Puedes poner lógica de permisos si lo deseas
    }

    /**
     * Reglas de validación para crear o actualizar un Historial de Servicio.
     */
    public function rules(): array
    {
        return [
            'fechaSalida' => 'required|date',
            'idTurno'     => 'required|exists:turnos,id',
        ];
    }

    /**
     * Mensajes personalizados para los errores de validación.
     */
    public function messages(): array
    {
        return [
            'fechaSalida.required' => 'La fecha de salida es obligatoria.',
            'fechaSalida.date' => 'Debe ingresar una fecha válida.',
            'idTurno.required'=> 'Debe seleccionar un turno válido.',
            'idTurno.exists' => 'El turno seleccionado no existe en el sistema.',
        ];
    }
}
