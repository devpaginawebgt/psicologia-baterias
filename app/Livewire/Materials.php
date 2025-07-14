<?php

namespace App\Livewire;

use App\Http\Services\BatteryService;
use App\Http\Services\CompanyService;
use Livewire\Component;
use Mary\Traits\Toast;

class Materials extends Component
{
    use Toast;

    //? Props
    public $company;
    public $batteries;

    //? Reactive properties
    public $form;

    public function mount()
    {
        $companyService  = app(CompanyService::class);
        $batteryService  = app(BatteryService::class);
        
        $this->company   = $companyService->getActive();
        $this->batteries = $batteryService->getAll();

        if ($toast = session('toast')) {
            $this->{$toast['type']}(
                $toast['title'],
                $toast['description'] ?? ''
            );
        }
    }

    public function render()
    {
        return view('livewire.materials')
            ->layout('components.layouts.batteries-layout', [
                'company' => $this->company,
                'batteries' => $this->batteries,
            ]);
    }
}
