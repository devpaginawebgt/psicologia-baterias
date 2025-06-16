<?php

namespace App\Http\Requests\Employee;

use App\Http\Services\EmployeeService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\SelectDisease;

class EmployeeRequest extends FormRequest
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
            'form.name'               => ['required', 'string',  'max:65'],
            'form.lastname'           => ['required', 'string',  'max:65'],
            'form.phone_number'       => ['required', 'integer', 'max_digits:8', 'unique:employees,phone_number'],
            'form.genre'              => ['required', 'string',  Rule::in(EmployeeService::genres())],
            'form.academic_level'     => ['required', 'string',  Rule::in(EmployeeService::academic())],
            'form.birthdate'          => ['required', 'date',    'date_format:Y-m-d'],
            'form.division_id'        => ['required', 'integer', 'exists:divisions,id'],
            'form.marital_status'     => ['required', 'string',  Rule::in(EmployeeService::marital())],
            'form.children'           => ['required', 'integer', 'min:0',  'max:50'],
            'form.people_depending'   => ['required', 'integer', 'min:0',  'max:50'],
            'form.diseases'           => ['required', 'array', 'min:1', new SelectDisease],
            'form.diseases.*'         => ['integer',  'exists:diseases,id'],
            'form.transportation'     => ['required', 'string',  Rule::in(EmployeeService::transportation())],
            'form.hiring_date'        => ['required', 'date',    'date_format:Y-m-d'],
            'form.shift'              => ['required', 'string',  Rule::in(EmployeeService::shifts())],
            'form.branch_number'      => ['required', 'integer', 'max:9999'],
            'form.branch_address'     => ['required', 'string',  'max:75'],
            'form.position'           => ['required', 'string',  Rule::in(EmployeeService::positions())],
            'form.sales_productivity' => ['required', 'numeric', 'decimal:0,2', 'min:1', 'max:999999'],
        ];
    }

    public function messages(): array
    {
        return [
            'form.phone_number.required'   => 'Ingresa tu número de teléfono',
            'form.phone_number.integer'    => 'Formato de teléfono inválido',
            'form.phone_number.max_digits' => 'El número de teléfono debe contener 8 dígitos',
            'form.phone_number.exists'     => 'El número de teléfono no existe en nuestros registros, por favor regístrese.',
            'form.phone_number.unique'     => 'Este número de teléfono ya está registrado, inicie sesión.',
            'form.diseases.required'       => 'Seleccione una opción del listado',
            'form.diseases.array'          => 'Seleccione una opción del listado',
            'form.diseases.min'            => 'Seleccione una opción del listado',
            'form.sales_productivity.max'  => 'El campo productividad no debe de ser mayor a Q 999,999.00',
            'form.sales_productivity.min'  => 'El campo productividad es requerido',
        ];
    }
}
