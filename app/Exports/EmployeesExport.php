<?php

namespace App\Exports;

use App\Http\Services\BatteryPointsService;
use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EmployeesExport implements FromQuery, WithHeadings, WithMapping, WithChunkReading
{
    protected BatteryPointsService $pointsService;

    public function __construct(
        protected string $search = ''
    ) {
        $this->pointsService = app(BatteryPointsService::class);
    }

    public function query()
    {
        return Employee::query()
            ->with([
                'branchDivision',
                'branchSubdivision',
                'diseases',
                'employeeBatteries' => fn($q) => $q->orderBy('submittion_date', 'asc'),
                'employeeBatteries.responses',
                'employeeBatteries.battery.questions',
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

            'Pretest Estrés',
            'Pretest Estrés Puntos',
            'Pretest Inteligencia Emocional',
            'Pretest Inteligencia Emocional Puntos',
            'Pretest Atención Emocional (I. E.)',
            'Pretest Atención Emocional (I. E.) Puntos',
            'Pretest Claridad Emocional (I. E.)',
            'Pretest Claridad Emocional (I. E.) Puntos',
            'Pretest Reparación de las Emociones (I. E.)',
            'Pretest Reparación de las Emociones (I. E.) Puntos',
            'Pretest Felicidad',
            'Pretest Felicidad Puntos',
            'Pretest Sentido positivo de la vida (Felicidad)',
            'Pretest Sentido positivo de la vida (Felicidad) Puntos',
            'Pretest Satisfacción con la vida (Felicidad)',
            'Pretest Satisfacción con la vida (Felicidad) Puntos',
            'Pretest Realización personal (Felicidad)',
            'Pretest Realización personal (Felicidad) Puntos',
            'Pretest Alegría de vivir (Felicidad)',
            'Pretest Alegría de vivir (Felicidad) Puntos',

            'Pretest Habilidades Sociales',
            'Pretest Habilidades Sociales Puntos',
            'Pretest Primeras habilidades sociales (H. S.)',
            'Pretest Primeras habilidades sociales (H. S.) Puntos',
            'Pretest Habilidades sociales avanzadas (H. S.)',
            'Pretest Habilidades sociales avanzadas (H. S.) Puntos',
            'Pretest Habilidades relacionadas con los sentimientos (H. S.)',
            'Pretest Habilidades relacionadas con los sentimientos (H. S.) Puntos',
            'Pretest Habilidades alternativas a la agresión (H. S.)',
            'Pretest Habilidades alternativas a la agresión (H. S.) Puntos',
            'Pretest Habilidades para hacer frente al estrés (H. S.)',
            'Pretest Habilidades para hacer frente al estrés (H. S.) Puntos',
            'Pretest Habilidades de Planificación (H. S.)',
            'Pretest Habilidades de Planificación (H. S.) Puntos',

            'Taller Inteligencia Emocional y Social',
            'Taller Herramientas para el manejo de las emociones',
            'Fecha Registro',
        ];
    }

    public function map($employee): array
    {
        $userBatteries = $employee->employeeBatteries->groupBy('battery_id');

        $stressResults    = $userBatteries->get(1, collect())->map(fn($b) => $this->pointsService->getStressResult($b));
        $emotionalResults = $userBatteries->get(2, collect())->map(fn($b) => $this->pointsService->getEmotionalResult($b));
        $happinessResults = $userBatteries->get(3, collect())->map(fn($b) => $this->pointsService->getHappinessResult($b));
        $socialResults    = $userBatteries->get(4, collect())->map(fn($b) => $this->pointsService->getSocialResult($b));

        $defaultLevel  = $this->pointsService::DefaultLevel;
        $defaultPoints = $this->pointsService::DefaultPoints;

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

            // Estrés
            $stressResults->get(1)?->level  ?? $defaultLevel,
            $stressResults->get(1)?->points ?? $defaultPoints,

            // Inteligencia Emocional
            $emotionalResults->get(1)?->level  ?? $defaultLevel,
            $emotionalResults->get(1)?->points ?? $defaultPoints,
            $emotionalResults->get(1)?->sublevels->get(1)->level  ?? $defaultLevel,
            $emotionalResults->get(1)?->sublevels->get(1)->points ?? $defaultPoints,
            $emotionalResults->get(1)?->sublevels->get(2)->level  ?? $defaultLevel,
            $emotionalResults->get(1)?->sublevels->get(2)->points ?? $defaultPoints,
            $emotionalResults->get(1)?->sublevels->get(3)->level  ?? $defaultLevel,
            $emotionalResults->get(1)?->sublevels->get(3)->points ?? $defaultPoints,

            // Felicidad
            $happinessResults->get(1)?->level  ?? $defaultLevel,
            $happinessResults->get(1)?->points ?? $defaultPoints,
            $happinessResults->get(1)?->sublevels->get(4)->level  ?? $defaultLevel,
            $happinessResults->get(1)?->sublevels->get(4)->points ?? $defaultPoints,
            $happinessResults->get(1)?->sublevels->get(5)->level  ?? $defaultLevel,
            $happinessResults->get(1)?->sublevels->get(5)->points ?? $defaultPoints,
            $happinessResults->get(1)?->sublevels->get(6)->level  ?? $defaultLevel,
            $happinessResults->get(1)?->sublevels->get(6)->points ?? $defaultPoints,
            $happinessResults->get(1)?->sublevels->get(7)->level  ?? $defaultLevel,
            $happinessResults->get(1)?->sublevels->get(7)->points ?? $defaultPoints,

            // Habilidades Sociales
            $socialResults->get(1)?->level  ?? $defaultLevel,
            $socialResults->get(1)?->points ?? $defaultPoints,
            $socialResults->get(1)?->sublevels->get(8)->level   ?? $defaultLevel,
            $socialResults->get(1)?->sublevels->get(8)->points  ?? $defaultPoints,
            $socialResults->get(1)?->sublevels->get(9)->level   ?? $defaultLevel,
            $socialResults->get(1)?->sublevels->get(9)->points  ?? $defaultPoints,
            $socialResults->get(1)?->sublevels->get(10)->level  ?? $defaultLevel,
            $socialResults->get(1)?->sublevels->get(10)->points ?? $defaultPoints,
            $socialResults->get(1)?->sublevels->get(11)->level  ?? $defaultLevel,
            $socialResults->get(1)?->sublevels->get(11)->points ?? $defaultPoints,
            $socialResults->get(1)?->sublevels->get(12)->level  ?? $defaultLevel,
            $socialResults->get(1)?->sublevels->get(12)->points ?? $defaultPoints,
            $socialResults->get(1)?->sublevels->get(13)->level  ?? $defaultLevel,
            $socialResults->get(1)?->sublevels->get(13)->points ?? $defaultPoints,

            $employee->emotional_social_session ? 'Asistió' : 'No asistió',
            $employee->emotional_management_session ? 'Asistió' : 'No asistió',
            $employee->created_at?->format('d/m/Y H:i') ?? 'N/A',
        ];
    }
}
