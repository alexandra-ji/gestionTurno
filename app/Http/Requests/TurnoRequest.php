<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TurnoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

             'codigoTurno' => 'required|string|max:50',
            'estadoTurno' => 'required|in:Pendiente,En Atención,Atendido,Cancelado,Ausente,Reasignado',
            'fecha' => 'required|date',
            'horaInicio' => 'required|date_format:H:i',
            'horaFin' => 'required|date_format:H:i|after_or_equal:horaInicio',
            'idUsuario' => 'required|exists:usuarios,id',
            'idServicio' => 'required|exists:servicios,id',
            'idEmpleado' => 'required|exists:empleados,id',
        ];
    }

    public function messages()
    {
        return [
            'codigoTurno.required' => 'El código del turno es obligatorio.',
            'codigoTurno.string' => 'El código del turno debe ser una cadena de texto.',
            'codigoTurno.max' => 'El código del turno no debe exceder los 50 caracteres.',

            'estadoTurno.required' => 'El estado del turno es obligatorio.',
            'estadoTurno.in' => 'El estado del turno seleccionado no es válido.',

            'fecha.required' => 'La fecha es obligatoria.',
            'fecha.date' => 'La fecha debe ser una fecha válida.',

            'horaInicio.required' => 'La hora de inicio es obligatoria.',
            'horaInicio.date_format' => 'La hora de inicio debe tener el formato HH:mm.',

            'horaFin.required' => 'La hora de fin es obligatoria.',
            'horaFin.date_format' => 'La hora de fin debe tener el formato HH:mm.',
            'horaFin.after_or_equal' => 'La hora de fin debe ser igual o posterior a la hora de inicio.',

            'idUsuario.required' => 'El usuario es obligatorio.',
            'idUsuario.exists' => 'El usuario seleccionado no existe.',

            'idServicio.required' => 'El servicio es obligatorio.',
            'idServicio.exists' => 'El servicio seleccionado no existe.',

            'idEmpleado.required' => 'El empleado es obligatorio.',
            'idEmpleado.exists' => 'El empleado seleccionado no existe.',
        ];
    }
}
