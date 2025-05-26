<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// Index
Route::get('/', function() {
    return redirect()->route('auth.login');
});

// Auth routes
require __DIR__.'/auth.php';

// Signed in routes
Route::group([], function() {
    require __DIR__.'/batteries.php';
}); 



//? Default routes
// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::middleware(['auth'])->group(function () {
//     Route::redirect('settings', 'settings/profile');

//     Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
//     Volt::route('settings/password', 'settings.password')->name('settings.password');
//     Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
// });
