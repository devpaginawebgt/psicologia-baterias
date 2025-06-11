<?php

namespace App\Livewire;

use App\Http\Requests\Employee\EmployeeLoginRequest;
use App\Http\Services\BatteryService;
use App\Http\Services\EmployeeService;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Mary\Traits\Toast;

class EmployeeLogin extends Component
{
    use Toast;

    public $form;

    public function mount()
    {
        if ($toast = session('toast')) {
            $this->{$toast['type']}(
                $toast['title'],
                $toast['description'] ?? ''
            );
        }

        $this->form = [ 'phone_number' => null ];
    }

    public function login()
    {
        $request = new EmployeeLoginRequest();

        Validator::make(
            ['form' => $this->form],
            $request->rules(),
            $request->messages()
        )->validate();

        $employeeService = app(EmployeeService::class);
        $login = $employeeService->login($this->form);

        if (isset($login['error'])) {
            $this->error(
                'Error',
                $login['message']
            );

            return;
        }

        session()->flash('toast', [
            'title'       => 'Bienvenido',
            'type'        => 'success',
        ]);

        $batteryService = app(BatteryService::class);
        $battery = $batteryService->getFirst();

        return redirect("/baterias/{$battery['url_type']}/{$battery['url']}");
    }

    public function render()
    {
        return view('livewire.employee-login')
            ->layout('components.layouts.employee-auth-layout', [
                'title' => 'Ingresar'
            ]);
    }
}
