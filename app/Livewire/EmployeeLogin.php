<?php

namespace App\Livewire;

use App\Http\Services\CompanyService;
use Livewire\Component;
use Mary\Traits\Toast;

class EmployeeLogin extends Component
{
    use Toast;

    public function mount()
    {
        if ($toast = session('toast')) {
            $this->{$toast['type']}(
                $toast['title'],
                $toast['description']
            );
        }
    }

    public function render()
    {
        return view('livewire.employee-login')
            ->layout('components.layouts.employee-auth-layout', [
                'title' => 'Ingresar'
            ]);
    }
}
