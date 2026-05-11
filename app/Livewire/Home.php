<?php

namespace App\Livewire;

use App\Http\Services\BatteryService;
use App\Http\Services\CompanyService;
use App\Http\Services\EmployeeService;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Mary\Traits\Toast;

class Home extends Component
{
    use Toast;

    //? Props
    #[Locked] public $employee;
    #[Locked] public $company;
    #[Locked] public $batteries;

    //? Reactive properties
    #[Locked] public $informed_consent;
    public $disableSubmit = false;

    public function mount()
    {
        $employeeService = app(EmployeeService::class);
        $companyService  = app(CompanyService::class);
        $batteryService  = app(BatteryService::class);
        
        $this->employee         = $employeeService->getById(intval(session('employee_id')));
        $this->informed_consent = boolval($this->employee->informed_consent);
        $this->company          = $companyService->getActive();
        $this->batteries        = $batteryService->getAll();

        if ($toast = session('toast')) {
            $this->{$toast['type']}(
                $toast['title'],
                $toast['description'] ?? ''
            );
        }
    }

    public function confirmConsent()
    {
        $this->disableSubmit = true;

        $employeeId = intval(session('employee_id'));

        $employeeService = app(EmployeeService::class);
        $employeeService->confirmConsent($employeeId);
        $this->informed_consent = true;
        
        $this->success(
            'Éxito',
            '¡Gracias por confirmar tu participación! Ya puedes comenzar a responder las escalas.',
            null,
            'o-check-circle',
            'alert-success',
            8000
        );

        $this->disableSubmit = false;
    }

    public function firstBattery()
    {
        $batteryService = app(BatteryService::class);
        $first_battery  = $batteryService->getFirst();
        return $batteryService->redirectTo($first_battery);
    }

    public function render()
    {
        return view('livewire.home')
            ->layout('components.layouts.batteries-layout', [
                'company' => $this->company,
                'batteries' => $this->batteries,
                'employee' => $this->employee
            ]);
    }
}
