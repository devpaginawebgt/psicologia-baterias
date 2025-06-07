<?php

namespace App\Http\Requests\Employee;

use App\Http\Services\EmployeeService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'name'             => ['required', 'string',  'max:65'],
            'phone_number'     => ['required', 'numeric', 'max_digits:8'],
            'genre'            => ['required', 'string',  Rule::in(EmployeeService::genres())],
            'academic_level'   => ['required', 'string',  Rule::in(EmployeeService::academic())],
            'birthdate'        => ['required', 'date',    'date_format:Y-m-d'],
            'division_id'      => ['required', 'integer', 'exists:divisions,id'],
            'marital_status'   => ['required', 'string',  Rule::in(EmployeeService::marital())],
            'children'         => ['required', 'integer', 'min:0',  'max:50'],
            'people_depending' => ['required', 'integer', 'min:0',  'max:50'],
            'diseases'         => ['nullable', 'array'],
            'diseases.*'       => ['integer',  'exists:diseases,id'],
            'transportation'   => ['required', 'string',  Rule::in(EmployeeService::transportation())],
            'hiring_date'      => ['required', 'date',    'date_format:Y-m-d'],
            'shift'            => ['required', 'string',  Rule::in(EmployeeService::shifts())],
            'branch_number'    => ['required', 'integer', 'max:9999'],
            'branch_address'   => ['required', 'string',  'max:75'],
            'position'         => ['required', 'string',  Rule::in(EmployeeService::positions())],
        ];
    }
}
