<?php

namespace App\Http\Requests\Employee;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeLoginRequest extends FormRequest
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
            'form.phone_number' => ['required', 'integer', 'max_digits:8', 'exists:employees,phone_number']
        ];
    }

    public function messages(): array
    {
        return [
            'form.phone_number.required'   => 'Ingresa tu número de teléfono',
            'form.phone_number.integer'    => 'Formato de teléfono inválido',
            'form.phone_number.max_digits' => 'El número de teléfono debe contener 8 dígitos',
            'form.phone_number.exists'     => 'El número de teléfono no existe en nuestros registros, por favor regístrese.',
        ];
    }
}
