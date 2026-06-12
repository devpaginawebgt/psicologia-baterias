<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EmployeesExport implements FromQuery, WithHeadings, WithMapping, WithChunkReading
{
    public function __construct(
        protected string $search = ''
    ) {}

    public function query()
    {
        return Employee::query()
            ->with([
                'branchDivision',
                'branchSubdivision',
                'diseases',
            ])
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', "%{$this->search}%")
                        ->orWhere('lastname', 'like', "%{$this->search}%")
                        ->orWhere('phone_number', 'like', "%{$this->search}%")
                        ->orWhere('position', 'like', "%{$this->search}%")
                        ->orWhereRaw("CONCAT(name, ' ', lastname) LIKE ?", ["%{$this->search}%"]);
                });
            })
            ->where('is_admin', false)
            ->orderBy('id');
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function headings(): array
    {
        return [
            '#',
            'Nombre',
            'Apellido',
            'Teléfono',
            'Fecha de nacimiento',
            'Género',
            'Nivel académico',
            'Estado civil',
            'Hijos',
            'Personas dependientes',
            'Transporte',
            'Fecha de contratación',
            'Depto. Sucursal',
            'Mun. Sucursal',
            'Puesto',
            'Enfermedades crónicas',
            'Consentimiento informado',
            'Taller Inteligencia Emocional y Social',
            'Taller Herramientas para el manejo de las emociones',
            'Fecha Registro',
        ];
    }

    public function map($employee): array
    {
        return [
            $employee->id,
            $employee->name,
            $employee->lastname,
            $employee->phone_number,
            $employee->birthdate?->format('d/m/Y') ?? 'N/A',
            $employee->genre,
            $employee->academic_level,
            $employee->marital_status,
            $employee->children,
            $employee->people_depending,
            $employee->transportation,
            $employee->hiring_date?->format('m/Y') ?? 'N/A',
            $employee->branchDivision?->name ?? 'N/A',
            $employee->branchSubdivision?->name ?? 'N/A',
            $employee->position,
            $employee->diseases->pluck('name')->join(', ') ?: 'Ninguna',
            $employee->informed_consent ? 'Aceptó' : 'No aceptó',
            $employee->emotional_social_session ? 'Asistió' : 'No asistió',
            $employee->emotional_management_session ? 'Asistió' : 'No asistió',
            $employee->created_at?->format('d/m/Y H:i') ?? 'N/A',
        ];
    }
}
