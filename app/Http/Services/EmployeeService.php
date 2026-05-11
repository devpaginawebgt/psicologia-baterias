<?php

namespace App\Http\Services;

use App\Models\Employee;
use App\Models\EmployeeToken;
use Illuminate\Support\Str;
use Carbon\Carbon;

class EmployeeService {
    public function __construct(
        private readonly CompanyService $companyService
    ) {}

    public function login(array $data) {
        $activeCompany = $this->companyService->getActive();
        $employee = Employee::where('phone_number', $data['phone_number'])->first();

        if (!$employee) {
            return [
                'error' => true,
                'message' => 'No se encontró el empleado, por favor regístrese.'
            ];
        }

        // Validate active company
        if ($employee->company_id !== $activeCompany->id && !$employee->is_admin) {
            return [
                'error' => true,
                'message' => 'No se puede ingresar al sistema, compañía incorrecta.'
            ];
        }

        // Get current token and delete it
        $currentToken = EmployeeToken::where('employee_id', $employee->id)->first();
        if ($currentToken) $currentToken->delete();

        // Generate new token (plain stays in session, hashed goes to DB)
        $plainToken = Str::random(40);
        $expiration = Carbon::now()->addHours(24)->toDateTimeString();

        $dbToken = EmployeeToken::create([
            'employee_id' => $employee->id,
            'token' => hash('sha256', $plainToken),
            'expires_at' => $expiration
        ]);

        if (!$dbToken) {
            return [
                'error' => true,
                'message' => 'Error al iniciar sesión. Contacta a soporte.'
            ];
        }

        session(['employee_id' => $employee->id]);
        session(['e_token' => $plainToken]);

        return [
            'message' => 'Éxito',
            'token' => $plainToken
        ];
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

        // Validate token (compare hashed)
        $dbToken = EmployeeToken::where('employee_id', $employeeId)
            ->where('token', hash('sha256', $token))
            ->first();

        if (!$dbToken)
            return forgetToken();

        return $dbToken->delete();
    }

    public function create(array $data) {
        $activeCompany = $this->companyService->getActive();
        $data['company_id'] = $activeCompany->id;

        $employee = Employee::create($data);
        
        $employee->diseases()->attach($data['diseases']);

        return $employee;
    }

    public function getById(int $id) {
        return Employee::find($id);
    }

    public function confirmConsent(int $employeeId)
    {
        $employee = Employee::find($employeeId);

        if (!$employee) return false;

        return $employee->forceFill(['informed_consent' => true])->save();
    }

    public function updateSessions(int $employeeId, array $data) {
        $employee = Employee::find($employeeId);

        if (!$employee)
            return ['update' => false, 'employee' => null];

        $update = $employee->forceFill([
            'emotional_social_session' => (bool) ($data['emotional_social_session'] ?? false),
            'emotional_management_session' => (bool) ($data['emotional_management_session'] ?? false),
        ])->save();

        return [
            'update' => $update,
            'employee' => $employee->fresh(),
        ];
    }

    public function hasCompletedSessions(int $employeeId)
    {
        $employee = Employee::find($employeeId);

        $session1 = $employee->emotional_social_session;
        $session2 = $employee->emotional_management_session;

        return ($session1 && $session2);
    }

    public static function getGenres() 
    {
        return [
            [ 'label' => 'Masculino' ],
            [ 'label' => 'Femenino' ],
        ];
    }

    public static function genres(): array
    {
        return collect(self::getGenres())->pluck('label')->all();
    }

    public static function getAcademicLevels() {
        return [
            [ 'label' => 'Primaria' ],
            [ 'label' => 'Secundaria' ],
            [ 'label' => 'Preparatoria' ],
            [ 'label' => 'Universidad' ],
            [ 'label' => 'Posgrado' ],
        ];
    }

    public static function academic(): array
    {
        return collect(self::getAcademicLevels())->pluck('label')->all();
    }

    public static function getMaritalStatuses() {
        return [
            [ 'label' => 'Soltero(a)' ],
            [ 'label' => 'Casado(a)' ],
            [ 'label' => 'Divorciado(a)' ],
            [ 'label' => 'Viudo(a)' ],
            [ 'label' => 'Union libre(a)' ],
        ];
    }

    public static function marital(): array
    {
        return collect(self::getMaritalStatuses())->pluck('label')->all();
    }

    public static function getTransportations() {
        return [
            [ 'label' => 'Auto', 'value' => 'Auto' ],
            [ 'label' => 'Transporte Público', 'value' => 'Transporte Publico' ],
        ];
    }

    public static function transportation(): array
    {
        return collect(self::getTransportations())->pluck('value')->all();
    }
    
    public static function getShifts() {
        return [
            [ 'label' => 'Matutino' ],
            [ 'label' => 'Vespertino' ],
            [ 'label' => 'Nocturno' ],
            [ 'label' => 'Mixto' ],
        ];
    }

    public static function shifts(): array
    {
        return collect(self::getShifts())->pluck('label')->all();
    }

    public static function getPositions() {
        return [
            [ 'label' => 'Dependiente' ],
            [ 'label' => 'Administrativo' ],
        ];
    }

    public static function positions(): array
    {
        return collect(self::getPositions())->pluck('label')->all();
    }

    public static function getBooleans() {
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