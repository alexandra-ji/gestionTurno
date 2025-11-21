<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
        'tipoDocumento' => 'required|in:Tarjeta De Identidad,Cedula De Ciudadania,Cedula De Extranjeria,Permiso Por Proteccion Temporal',
        'numeroDocumento' => 'required|digits_between:5,20|regex:/^[0-9]+$/',
        'nombre' => 'required|min:3|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
        'correo' => 'required|string|email|max:100',
        'telefono' => 'required|digits_between:10,20|regex:/^[0-9]+$/',
        ];
        
    }

      public function messages(): array
    {
        return [
        'tipoDocumento.required' => 'El tipo de documento es obligatorio.',
        'tipoDocumento.in' => 'El tipo de documento seleccionado no es válido.',

        'numeroDocumento.required' => 'El número de documento es obligatorio.',
        'numeroDocumento.regex' => 'El número de documento solo puede contener números.',
        'numeroDocumento.digits_between' => 'El número de documento debe tener entre 5 y 20 dígitos.',

        'nombre.required' => 'El nombre es obligatorio.',
        'nombre.min' => 'El nombre debe tener al menos 3 caracteres.',

        'correo.required' => 'El correo es obligatorio.',
        'correo.email' => 'Debe ingresar un correo válido.',
        'correo.unique' => 'Este correo ya está registrado.',
        
        'telefono.required' => 'El teléfono es obligatorio.',
        'telefono.regex' => 'El teléfono solo puede contener números.',
        'telefono.digits_between' => 'El teléfono debe tener entre 10 y 20 dígitos.',
        ];
}
}