<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;

#[Layout('components.layouts.batteries-layout')]
class Materials extends Component
{
    use Toast;

    //? Reactive properties
    public $form;

    public function mount()
    {
        if ($toast = session('toast')) {
            $this->{$toast['type']}(
                $toast['title'],
                $toast['description'] ?? ''
            );
        }
    }

    public function render()
    {
        return view('livewire.materials');
    }
}
