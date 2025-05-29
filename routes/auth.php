<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\EmployeeAuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->as('auth')->group(function () {
    Route::controller(EmployeeAuthController::class)->group(function() {
        Route::get('ingresar', 'index')->name('.login');
        Route::get('registrarse', 'create')->name('.register');
    });
});

// Route::post('logout', App\Livewire\Actions\Logout::class)
//     ->name('logout');
