<?php

namespace App\Livewire;

use App\Http\Services\BatteryService;
use App\Http\Services\CompanyService;
use App\Http\Services\EmployeeService;
use Livewire\Component;
use Mary\Traits\Toast;

class Home extends Component
{
    use Toast;

    //? Props
    public $employee;
    public $company;
    public $batteries;

    //? Reactive properties
    public $informed_consent;
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
        $employeeService = app(EmployeeService::class);
        $employeeService->confirmConsent($this->employee->id);
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

    public function render()
    {
        return view('livewire.home')
            ->layout('components.layouts.batteries-layout', [
                'company' => $this->company,
                'batteries' => $this->batteries,
            ]);
    }
}
