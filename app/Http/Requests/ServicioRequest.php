<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicioRequest extends FormRequest
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
            'nombreServicio' => 'required|string|max:255',
            'descripcion'    => 'required|string|max:255',
            'idDependencia'  => 'required|exists:dependencias,id',
        ];


    }

      public function messages(): array
    {
        return [
            'nombreServicio.required' => 'El nombre del servicio es obligatorio.',
            'nombreServicio.string'   => 'El nombre del servicio debe ser una cadena de texto.',
            'nombreServicio.max'      => 'El nombre del servicio no puede tener más de 50 caracteres.',

            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.string'   => 'La descripción debe ser una cadena de texto.',
            'descripcion.max'      => 'La descripción no puede tener más de 255 caracteres.',

            'idDependencia.required' => 'La dependencia es obligatoria.',
            'idDependencia.exists'   => 'La dependencia seleccionada no existe en el sistema.',
        ];
    }
}
