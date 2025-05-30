<?php

use Illuminate\Support\Facades\Route;

// Index
Route::get('/', function() {
    return redirect()->route('auth.index');
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

