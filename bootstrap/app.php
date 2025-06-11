<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Validation\ValidationException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // $exceptions->reportable(function (ValidationException $e) {
        //     $firstError = collect($e->errors())->first()[0];

        //     session()->flash('toast', [
        //         'title'       => 'Error',
        //         'description' => $firstError,
        //         'type'        => 'error',
        //     ]); 
        // });
    })->create();
