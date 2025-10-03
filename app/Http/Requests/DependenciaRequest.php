<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DependenciaRequest extends FormRequest
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
              
             'nombre' => 'required|string|max:255',
            'descripcion'    => 'required|string|max:255',
        ];
    }

       public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre de la dependencia es obligatorio.',
            'nombre.string'   => 'El nombre de la dependencia debe ser una cadena de texto.',
            'nombre.max'      => 'El nombre de la dependencia no puede tener más de 50 caracteres.',

            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.string'   => 'La descripción debe ser una cadena de texto.',
            'descripcion.max'      => 'La descripción no puede tener más de 255 caracteres.',

         
        ];
    }
}
