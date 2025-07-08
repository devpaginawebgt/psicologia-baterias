<?php

use App\Http\Controllers\SubdivisionController;
use Illuminate\Support\Facades\Route;

// Rutas públicas
Route::controller(SubdivisionController::class)
->prefix('/subdivisiones')
->as('subdivisions')
->group(function() {
    Route::get('', 'getByDivision')->name('index');
});

Route::get('/', function() {
    return redirect()->route('auth.index');
});

// Auth routes
require __DIR__.'/auth.php';

// Signed in routes
Route::group([], function() {
    require __DIR__.'/batteries.php';
}); 
