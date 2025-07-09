<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BatteryController;
use App\Livewire\BatterySelect;
use App\Livewire\EmployeeConfig;
use App\Livewire\Home;

Route::prefix('baterias')->as('batteries')->group(function() {
    Route::controller(BatteryController::class)->group(function() {
        Route::get('salir', 'logout')->name('.logout');
    });
    
    // Select Batteries
    Route::get('inicio', Home::class)->name('.home');
    Route::get('configuraciones', EmployeeConfig::class)->name('.config');
    Route::get('seleccionable/{slug}', BatterySelect::class)->name('.select');
})

?>