<?php

namespace App\Livewire;

use App\Http\Services\BatteryService;
use App\Http\Services\CompanyService;
use Livewire\Component;

class Battery2 extends Component
{
    //? Props

    public $company;
    public $batteries;
    public $battery;

    public function mount()
    {
        $companyService = app(CompanyService::class);
        $batteryService = app(BatteryService::class);

        $this->company = $companyService->getActive();
        $this->batteries = $batteryService->getAll();
        $this->battery = $batteryService->getBatteryById(2);
    }


    //? Reactive

    public $step = 'start';

    public $questions = [
        [
            'text' => '¿Te resulta fácil tomar decisiones rápidamente?',
            'name' => 'start-day-preference',
            'options' => [
                ['id' => 1, 'label' => 'Si'],
                ['id' => 2, 'label' => 'No'],
            ]
        ],

        [
            'text' => '¿Te sientes motivado sin que alguien te lo recuerde?',
            'name' => 'spare-time-preference',
            'options' => [
                ['id' => 3, 'label' => 'Si'],
                ['id' => 4, 'label' => 'No'],
            ]
        ],

        [
            'text' => '¿Te adaptas con facilidad a cambios de rutina?',
            'name' => 'climate-preference',
            'options' => [
                ['id' => 5, 'label' => 'Si'],
                ['id' => 6, 'label' => 'No'],
            ]
        ],
    ];

    //? Methods

    public function startBattery()
    {
        $this->step = 'questions';
    }

    public function finishBattery()
    {
        $this->step = 'finished';
    }

    public function nextBattery()
    {
        redirect()->route('batteries.third');
    }


    //? Render

    public function render()
    {
        /** @var \Livewire\WireableView $view */
        return view('livewire.battery-2')
            ->layout('components.layouts.batteries-layout', [
                'company' => $this->company,
                'batteries' => $this->batteries,
            ]);
    }
}
