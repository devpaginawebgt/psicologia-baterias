<?php

namespace App\Livewire;

use App\Http\Services\BatteryPointsService;
use App\Models\Employee;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Mary\Traits\Toast;

#[Layout('components.layouts.batteries-layout')]
class EmployeesReport extends Component
{
    use Toast;
    use WithPagination;

    #[Url(as: 'q', except: '')]
    public string $search = '';

    public int $perPage = 15;

    public function mount()
    {
        if ($toast = session('toast')) {
            $this->{$toast['type']}(
                $toast['title'],
                $toast['description'] ?? ''
            );
        }
    }

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function clearSearch(): void
    {
        $this->search = '';
        $this->resetPage();
    }

    public function render()
    {
        $pointsService = app(BatteryPointsService::class);

        $employees = Employee::query()
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
            ->orderBy('id')
            ->paginate($this->perPage);

        $headers = [
            ['key' => 'id',                            'label' => '#',                                                      'class' => 'w-12'],
            ['key' => 'name',                          'label' => 'Nombre'],
            ['key' => 'lastname',                      'label' => 'Apellido'],
            ['key' => 'phone_number',                  'label' => 'Teléfono'],
            ['key' => 'birthdate',                     'label' => 'Fecha de nacimiento',                                    'sortable' => false],
            ['key' => 'genre',                         'label' => 'Género'],
            ['key' => 'academic_level',                'label' => 'Nivel académico'],
            ['key' => 'marital_status',                'label' => 'Estado civil'],
            ['key' => 'children',                      'label' => 'Hijos'],
            ['key' => 'people_depending',              'label' => 'Personas dependientes'],
            ['key' => 'transportation',                'label' => 'Transporte'],
            ['key' => 'hiring_date',                   'label' => 'Fecha de contratación',                                  'sortable' => false],
            ['key' => 'branch_division',               'label' => 'Depto. Sucursal',                                        'sortable' => false],
            ['key' => 'branch_subdivision',            'label' => 'Mun. Sucursal',                                          'sortable' => false],
            ['key' => 'position',                      'label' => 'Puesto'],
            ['key' => 'diseases',                      'label' => 'Enfermedades crónicas'],
            ['key' => 'informed_consent',              'label' => 'Consentimiento informado',                               'sortable' => false],

            ['key' => 'stress_level_1',                'label' => 'Pretest Estrés'],
            ['key' => 'stress_points_1',               'label' => 'Pretest Estrés Puntos'],
            ['key' => 'emotional_level_1',             'label' => 'Pretest Inteligencia Emocional'],
            ['key' => 'emotional_points_1',            'label' => 'Pretest Inteligencia Emocional Puntos'],
            ['key' => 'attention_level_1',             'label' => 'Pretest Atención Emocional (I. E.)'],
            ['key' => 'attention_points_1',            'label' => 'Pretest Atención Emocional (I. E.) Puntos'],
            ['key' => 'clarity_level_1',               'label' => 'Pretest Claridad Emocional (I. E.)'],
            ['key' => 'clarity_points_1',              'label' => 'Pretest Claridad Emocional (I. E.) Puntos'],
            ['key' => 'emotional_repair_level_1',      'label' => 'Pretest Reparación de las Emociones (I. E.)'],
            ['key' => 'emotional_repair_points_1',     'label' => 'Pretest Reparación de las Emociones (I. E.) Puntos'],

            ['key' => 'happiness_level_1',             'label' => 'Pretest Felicidad'],
            ['key' => 'happiness_points_1',            'label' => 'Pretest Felicidad Puntos'],
            ['key' => 'positive_meaning_level_1',      'label' => 'Pretest Sentido positivo de la vida (Felicidad)'],
            ['key' => 'positive_meaning_points_1',     'label' => 'Pretest Sentido positivo de la vida (Felicidad) Puntos'],
            ['key' => 'life_satisfaction_level_1',     'label' => 'Pretest Satisfacción con la vida (Felicidad)'],
            ['key' => 'life_satisfaction_points_1',    'label' => 'Pretest Satisfacción con la vida (Felicidad) Puntos'],
            ['key' => 'personal_fulfillment_level_1',  'label' => 'Pretest Realización personal (Felicidad)'],
            ['key' => 'personal_fulfillment_points_1', 'label' => 'Pretest Realización personal (Felicidad) Puntos'],
            ['key' => 'joy_of_living_level_1',         'label' => 'Pretest Alegría de vivir (Felicidad)'],
            ['key' => 'joy_of_living_points_1',        'label' => 'Pretest Alegría de vivir (Felicidad) Puntos'],

            ['key' => 'social_level_1',                    'label' => 'Pretest Habilidades Sociales'],
            ['key' => 'social_points_1',                   'label' => 'Pretest Habilidades Sociales Puntos'],
            ['key' => 'first_social_skills_level_1',       'label' => 'Pretest Primeras habilidades sociales (H. S.)'],
            ['key' => 'first_social_skills_points_1',      'label' => 'Pretest Primeras habilidades sociales (H. S.) Puntos'],
            ['key' => 'advanced_social_skills_level_1',    'label' => 'Pretest Habilidades sociales avanzadas (H. S.)'],
            ['key' => 'advanced_social_skills_points_1',   'label' => 'Pretest Habilidades sociales avanzadas (H. S.) Puntos'],
            ['key' => 'feelings_skills_level_1',           'label' => 'Pretest Habilidades relacionadas con los sentimientos (H. S.)'],
            ['key' => 'feelings_skills_points_1',          'label' => 'Pretest Habilidades relacionadas con los sentimientos (H. S.) Puntos'],
            ['key' => 'aggression_alternatives_level_1',   'label' => 'Pretest Habilidades alternativas a la agresión (H. S.)'],
            ['key' => 'aggression_alternatives_points_1',  'label' => 'Pretest Habilidades alternativas a la agresión (H. S.) Puntos'],
            ['key' => 'stress_coping_level_1',             'label' => 'Pretest Habilidades para hacer frente al estrés (H. S.)'],
            ['key' => 'stress_coping_points_1',            'label' => 'Pretest Habilidades para hacer frente al estrés (H. S.) Puntos'],
            ['key' => 'planning_skills_level_1',           'label' => 'Pretest Habilidades de Planificación (H. S.)'],
            ['key' => 'planning_skills_points_1',          'label' => 'Pretest Habilidades de Planificación (H. S.) Puntos'],

            ['key' => 'emotional_social_session',     'label' => 'Taller Inteligencia Emocional y Social',                  'sortable' => false],
            ['key' => 'emotional_management_session', 'label' => 'Taller Herramientas para el manejo de las emociones',     'sortable' => false],
            ['key' => 'created_at',                   'label' => 'Fecha Registro',                                          'sortable' => false],
        ];

        $rows = $employees->getCollection()->map(function ($e) use($pointsService) {

            $user_batteries = $e->employeeBatteries->groupBy('battery_id');

            // Resultado Estrés

            $stress_results = $user_batteries->get(1, collect())->map(function($user_battery) use($pointsService) {
                return $pointsService->getStressResult($user_battery);
            });

            // Resultado Inteligencia Emocional

            $emotional_results = $user_batteries->get(2, collect())->map(function($user_battery) use($pointsService) {
                return $pointsService->getEmotionalResult($user_battery);
            });

            // Resultado Felicidad

            $happiness_results = $user_batteries->get(3, collect())->map(function($user_battery) use($pointsService) {
                return $pointsService->getHappinessResult($user_battery);
            });

            // Resultado Habilidades Sociales

            $social_results = $user_batteries->get(4, collect())->map(function($user_battery) use($pointsService) {
                return $pointsService->getSocialResult($user_battery);
            });

            // Resultado Escala Emocional

            return [
                'id'                           => $e->id,
                'name'                         => $e->name,
                'lastname'                     => $e->lastname,
                'phone_number'                 => $e->phone_number,
                'birthdate'                    => $e->birthdate?->format('d/m/Y') ?? 'N/A',
                'genre'                        => $e->genre,
                'academic_level'               => $e->academic_level,
                'marital_status'               => $e->marital_status,
                'children'                     => $e->children,
                'people_depending'             => $e->people_depending,
                'transportation'               => $e->transportation,
                'hiring_date'                  => $e->hiring_date?->format('m/Y') ?? 'N/A',
                'branch_division'              => $e->branchDivision?->name ?? 'N/A',
                'branch_subdivision'           => $e->branchSubdivision?->name ?? 'N/A',
                'position'                     => $e->position,
                'diseases'                     => $e->diseases->pluck('name')->join(', ') ?: 'Ninguna',
                'informed_consent'             => $e->informed_consent ? 'Aceptó' : 'No aceptó',

                // Pre-test

                // Nivel de estrés
                'stress_level_1'               => $stress_results->get(1)?->level ?? $pointsService::DefaultLevel,
                'stress_points_1'              => $stress_results->get(1)?->points ?? $pointsService::DefaultPoints,

                // Inteligencia emocional
                'emotional_level_1'            => $emotional_results->get(1)?->level ?? $pointsService::DefaultLevel,
                'emotional_points_1'           => $emotional_results->get(1)?->points ?? $pointsService::DefaultPoints,
                'attention_level_1'            => $emotional_results->get(1)?->sublevels->get(1)->level  ?? $pointsService::DefaultLevel,
                'attention_points_1'           => $emotional_results->get(1)?->sublevels->get(1)->points ?? $pointsService::DefaultPoints,
                'clarity_level_1'              => $emotional_results->get(1)?->sublevels->get(2)->level  ?? $pointsService::DefaultLevel,
                'clarity_points_1'             => $emotional_results->get(1)?->sublevels->get(2)->points ?? $pointsService::DefaultPoints,
                'emotional_repair_level_1'     => $emotional_results->get(1)?->sublevels->get(3)->level  ?? $pointsService::DefaultLevel,
                'emotional_repair_points_1'    => $emotional_results->get(1)?->sublevels->get(3)->points ?? $pointsService::DefaultPoints,

                // Felicidad
                'happiness_level_1'             => $happiness_results->get(1)?->level  ?? $pointsService::DefaultLevel,
                'happiness_points_1'            => $happiness_results->get(1)?->points ?? $pointsService::DefaultPoints,
                'positive_meaning_level_1'      => $happiness_results->get(1)?->sublevels->get(4)->level  ?? $pointsService::DefaultLevel,
                'positive_meaning_points_1'     => $happiness_results->get(1)?->sublevels->get(4)->points ?? $pointsService::DefaultPoints,
                'life_satisfaction_level_1'     => $happiness_results->get(1)?->sublevels->get(5)->level  ?? $pointsService::DefaultLevel,
                'life_satisfaction_points_1'    => $happiness_results->get(1)?->sublevels->get(5)->points ?? $pointsService::DefaultPoints,
                'personal_fulfillment_level_1'  => $happiness_results->get(1)?->sublevels->get(6)->level  ?? $pointsService::DefaultLevel,
                'personal_fulfillment_points_1' => $happiness_results->get(1)?->sublevels->get(6)->points ?? $pointsService::DefaultPoints,
                'joy_of_living_level_1'         => $happiness_results->get(1)?->sublevels->get(7)->level  ?? $pointsService::DefaultLevel,
                'joy_of_living_points_1'        => $happiness_results->get(1)?->sublevels->get(7)->points ?? $pointsService::DefaultPoints,

                // Habilidades sociales
                'social_level_1'                    => $social_results->get(1)?->level  ?? $pointsService::DefaultLevel,
                'social_points_1'                   => $social_results->get(1)?->points ?? $pointsService::DefaultPoints,
                'first_social_skills_level_1'       => $social_results->get(1)?->sublevels->get(8)->level   ?? $pointsService::DefaultLevel,
                'first_social_skills_points_1'      => $social_results->get(1)?->sublevels->get(8)->points  ?? $pointsService::DefaultPoints,
                'advanced_social_skills_level_1'    => $social_results->get(1)?->sublevels->get(9)->level   ?? $pointsService::DefaultLevel,
                'advanced_social_skills_points_1'   => $social_results->get(1)?->sublevels->get(9)->points  ?? $pointsService::DefaultPoints,
                'feelings_skills_level_1'           => $social_results->get(1)?->sublevels->get(10)->level  ?? $pointsService::DefaultLevel,
                'feelings_skills_points_1'          => $social_results->get(1)?->sublevels->get(10)->points ?? $pointsService::DefaultPoints,
                'aggression_alternatives_level_1'   => $social_results->get(1)?->sublevels->get(11)->level  ?? $pointsService::DefaultLevel,
                'aggression_alternatives_points_1'  => $social_results->get(1)?->sublevels->get(11)->points ?? $pointsService::DefaultPoints,
                'stress_coping_level_1'             => $social_results->get(1)?->sublevels->get(12)->level  ?? $pointsService::DefaultLevel,
                'stress_coping_points_1'            => $social_results->get(1)?->sublevels->get(12)->points ?? $pointsService::DefaultPoints,
                'planning_skills_level_1'           => $social_results->get(1)?->sublevels->get(13)->level  ?? $pointsService::DefaultLevel,
                'planning_skills_points_1'          => $social_results->get(1)?->sublevels->get(13)->points ?? $pointsService::DefaultPoints,



                // Talleres
                'emotional_social_session'     => $e->emotional_social_session ? 'Asistió' : 'No asistió',
                'emotional_management_session' => $e->emotional_management_session ? 'Asistió' : 'No asistió',

                // Post-test
                
                'created_at'                   => $e->created_at?->format('d/m/Y H:i') ?? 'N/A',
            ];
        });

        return view('livewire.employees-report', [
            'headers'    => $headers,
            'rows'       => $rows,
            'paginator'  => $employees,
            'exportUrl'  => route('batteries.report.employees.export', ['search' => $this->search]),
        ]);
    }
}
