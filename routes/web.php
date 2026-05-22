<?php

use App\Http\Middleware\EmployeeTokenIsValid;
use App\Livewire\EmployeeDetailedResults;
use App\Livewire\EmployeeResults;
use Illuminate\Support\Facades\Route;

// Resources routes
require __DIR__.'/resources.php';

// Auth routes
require __DIR__.'/auth.php';

// Signed in routes
Route::middleware(EmployeeTokenIsValid::class)->group(function() {
    require __DIR__.'/batteries.php';

    Route::get('resultados', EmployeeResults::class)->name('results');
    // Route::get('resultados/detalle', EmployeeDetailedResults::class)->name('results.detailed');
});

// Fallback route
Route::fallback(function () {
    return redirect()->route('batteries.home');
});