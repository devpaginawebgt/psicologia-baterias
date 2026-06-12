<?php

namespace App\Http\Controllers;

use App\Exports\EmployeesExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeReportController extends Controller
{
    public function export(Request $request)
    {
        $search = (string) $request->query('search', '');

        $fileName = 'empleados_' . now()->format('Ymd_His') . '.xlsx';

        return Excel::download(new EmployeesExport($search), $fileName);
    }
}
