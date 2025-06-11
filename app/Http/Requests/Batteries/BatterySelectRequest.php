<?php

namespace App\Http\Requests\Batteries;

use Illuminate\Foundation\Http\FormRequest;

class BatterySelectRequest extends FormRequest
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
            'form' => ['required', 'array'],
            'form.*' => ['integer', 'exists:question_options,id']
        ];
    }

    public function messages(): array
    {
        return [
            'form.*.integer' => 'Seleccione una opción del listado',
            'form.*.exists' => 'Error en la opción.'
        ];
    }
}
