<?php

namespace App\Livewire;

use App\Http\Services\CompanyService;
use Livewire\Component;

class EmployeeLogin extends Component
{
    public function render()
    {
        return view('livewire.employee-login')
            ->layout('components.layouts.employee-auth-layout');
    }
}
