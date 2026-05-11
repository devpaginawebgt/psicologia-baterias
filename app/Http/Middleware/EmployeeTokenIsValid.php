<?php

namespace App\Http\Middleware;

use App\Models\EmployeeToken;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeeTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        function forgetToken() {
            session()->forget('e_token');
            session()->forget('employee_id');

            return redirect()->route('auth.index');
        }

        // Validate data
        $token = session('e_token');
        $employeeId = intval(session('employee_id'));

        if (!$token || !$employeeId) 
            return forgetToken();

        // Validate token (compare hashed)
        $dbToken = EmployeeToken::where('employee_id', $employeeId)
            ->where('token', hash('sha256', $token))
            ->first();

        if (!$dbToken)
            return forgetToken();

        // Validate expiration date
        if ($dbToken->expires_at->isPast()) 
            return forgetToken();
        
        return $next($request);
    }
}
