<?php

namespace App\Providers;

use App\Http\Services\BatteryService;
use App\Http\Services\CompanyService;
use App\Http\Services\EmployeeService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        $defaultInfoComponents = [
            'components.layouts.batteries-layout', 
            'livewire.employee-results'
        ];

        View::composer($defaultInfoComponents, function ($view) {
            $employeeId = intval(session('employee_id'));

            $view->with([
                'company'   => app(CompanyService::class)->getActive(),
                'batteries' => app(BatteryService::class)->getAll(),
                'employee'  => $employeeId ? app(EmployeeService::class)->getById($employeeId) : null,
            ]);
        });
    }
}
