<?php

namespace App\Http\Services;

use App\Http\Requests\Employee\EmployeeLoginRequest;
use App\Http\Requests\Employee\EmployeeRequest;
use App\Models\Employee;
use App\Models\EmployeeToken;
use Illuminate\Support\Str;
use Carbon\Carbon;


class EmployeeService {
    public function __construct(
        private readonly CompanyService $companyService
    ) {}

    public function login(EmployeeLoginRequest $request) {
        $data = $request->validated();
        $activeCompany = $this->companyService->getActive();
        $employee = Employee::where('phone_number', $data['phone_number'])->first();

        if (!$employee)
            dd('No se encontró el empleado, por favor regístrese.');

        // Validate active company
        if ($employee->company_id !== $activeCompany->id)
            dd('No se puede ingresar al sistema, compañía incorrecta.');

        // Get current token and delete it
        $currentToken = EmployeeToken::where('employee_id', $employee->id)->first();
        if ($currentToken) $currentToken->delete();
        
        // Generate new token
        $token = Str::random(24);
        $expiration = Carbon::now()->addDays(2)->toDateTimeString();

        $dbToken = EmployeeToken::create([
            'employee_id' => $employee->id,
            'token' => $token,
            'expires_at' => $expiration
        ]);

        if (!$dbToken)
            dd('Error al crear token');

        session(['employee_id' => $employee->id]);
        session(['e_token' => $token]);
    }

    public function logout() {
        function forgetToken() {
            session()->forget('e_token');
            session()->forget('employee_id');

            return redirect()->route('auth.index');
        }

        $token = session('e_token');
        $employeeId = session('employee_id');

        if (!$token || !$employeeId) 
            return forgetToken();

        // Validate token
        $dbToken = EmployeeToken::where('employee_id', $employeeId)
            ->where('token', $token)
            ->first();

        if (!$dbToken)
            return forgetToken();

        return $dbToken->delete();
    }

    public function create(EmployeeRequest $request) {
        // $data = $request->validated();
        $employee = Employee::create($request->all());

        return $employee;
    }

    public function getGenres() {
        return [
            [ 'label' => 'Masculino' ],
            [ 'label' => 'Femenino' ],
        ];
    }

    public function getAcademicLevels() {
        return [
            [ 'label' => 'Primaria' ],
            [ 'label' => 'Secundaria' ],
            [ 'label' => 'Preparatoria' ],
            [ 'label' => 'Universidad' ],
            [ 'label' => 'Posgrado' ],
        ];
    }

    public function getMaritalStatuses() {
        return [
            [ 'label' => 'Casado' ],
            [ 'label' => 'Divorciado' ],
            [ 'label' => 'Viudo' ],
            [ 'label' => 'Union libre' ],
        ];
    }
    
    public function getShifts() {
        return [
            [ 'label' => 'Matutino' ],
            [ 'label' => 'Vespertino' ],
            [ 'label' => 'Nocturno' ],
            [ 'label' => 'Mixto' ],
        ];
    }

    public function getBooleans() {
        return [
            [ 
                'label' => 'No',
                'value' => 0,
            ],
            [ 
                'label' => 'Sí',
                'value' => 1,
            ],
        ];
    }
}

?>