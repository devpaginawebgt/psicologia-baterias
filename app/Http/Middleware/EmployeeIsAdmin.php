<?php

namespace App\Http\Middleware;

use App\Models\Employee;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeeIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $employeeId = intval(session('employee_id'));
        $employee = Employee::find($employeeId);

        if (!$employee) {
            abort(403);
        }

        if (!$employee->is_admin) {
            return redirect()->route('batteries.home');
        }

        return $next($request);
    }
}
