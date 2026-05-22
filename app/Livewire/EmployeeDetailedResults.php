<?php

namespace App\Livewire;

use App\Http\Services\EmployeeService;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;

#[Layout('components.layouts.batteries-layout')]
class EmployeeDetailedResults extends Component
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
        $employee = app(EmployeeService::class)->getById(intval(session('employee_id')));

        return $employee
            ->employeeBatteries()
            ->with(['responses.question', 'responses.category'])
            ->orderBy('submittion_date')
            ->get()
            ->groupBy('battery_id');
    }

    public function render()
    {
        return view('livewire.employee-detailed-results', [
            'employeeBatteries' => $this->employeeBatteries,
        ]);
    }
}
