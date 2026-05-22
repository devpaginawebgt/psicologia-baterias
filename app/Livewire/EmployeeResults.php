<?php

namespace App\Livewire;

use App\Http\Services\EmployeeService;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Mary\Traits\Toast;

#[Layout('components.layouts.batteries-layout')]
class EmployeeResults extends Component
{
    use Toast;

    public string $selectedTab = '1';

    public function mount()
    {
        if ($toast = session('toast')) {
            $this->{$toast['type']}(
                $toast['title'],
                $toast['description'] ?? ''
            );
        }
    }

    #[Computed]
    public function employeeBatteries()
    {
        // View config 
        $employee = app(EmployeeService::class)->getById(intval(session('employee_id')));

        return $employee
            ->employeeBatteries()
            ->with('responses')
            ->orderBy('submittion_date')
            ->get()
            ->groupBy('battery_id');
    }

    public function render()
    {
        return view('livewire.employee-results', [
            'employeeBatteries' => $this->employeeBatteries,
        ]);
    }
}
