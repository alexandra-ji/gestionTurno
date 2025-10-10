<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoDependenciaRequest extends FormRequest
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


            'idEmpleado' => 'required|exists:empleados,id',
            'idDependencia' => 'required|exists:dependencias,id',


        ];
    }

    public function messages(): array
    {
        return [
            'idEmpleado.required' => 'Debe seleccionar un empleado.',
            'idEmpleado.exists' => 'El empleado seleccionado no existe.',
            'idDependencia.required' => 'Debe seleccionar una dependencia.',
            'idDependencia.exists' => 'La dependencia seleccionada no existe.',
        ];
    }
}
