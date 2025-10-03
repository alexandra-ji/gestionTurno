<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoRequest extends FormRequest
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

            'nombreCompleto'   => 'required|string|max:255|min:3',
            'numeroDocumento'  => 'required|digits_between:5,20|regex:/^[0-9]+$/',
            'telefono'         =>  'required|digits_between:10,20|regex:/^[0-9]+$/',
            'correo'           => 'required|string|email|max:100',

        ];
    }


    public function messages(): array
    {
        return [
            'nombreCompleto.required'  => 'El nombre completo es obligatorio.',
            'nombreCompleto.string'    => 'El nombre completo debe ser una cadena de texto.',
            'nombreCompleto.max'       => 'El nombre completo no debe superar los 255 caracteres.',

            'numeroDocumento.required' => 'El número de documento es obligatorio.',
            'numeroDocumento.regex' => 'El número de documento solo puede contener números.',
            'numeroDocumento.digits_between' => 'El número de documento debe tener entre 5 y 20 dígitos.',

            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.regex' => 'El teléfono solo puede contener números.',
            'telefono.digits_between' => 'El teléfono debe tener entre 10 y 20 dígitos.',

            'correo.required' => 'El correo es obligatorio.',
            'correo.email' => 'Debe ingresar un correo válido.',
            'correo.unique' => 'Este correo ya está registrado.',
        ];
    }
}
