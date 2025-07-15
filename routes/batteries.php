<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BatteryController;
use App\Livewire\BatterySelect;
use App\Livewire\Home;
use App\Livewire\Materials;
use App\Livewire\Workshops;

Route::prefix('baterias')->as('batteries')->group(function() {
    Route::controller(BatteryController::class)->group(function() {
        Route::get('salir', 'logout')->name('.logout');
    });
    
    // Select Batteries
    Route::get('inicio', Home::class)->name('.home');
    Route::get('materiales', Materials::class)->name('.materials');
    Route::get('talleres', Workshops::class)->name('.workshops');
    Route::get('seleccionable/{slug}', BatterySelect::class)->name('.select');
})

?>