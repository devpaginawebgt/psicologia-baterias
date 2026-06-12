<?php

namespace App\Livewire;

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
        $employees = Employee::query()
            ->with(['branchDivision', 'branchSubdivision', 'diseases'])
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
            ['key' => 'id',                 'label' => '#',                       'class' => 'w-12'],
            ['key' => 'name',               'label' => 'Nombre'],
            ['key' => 'lastname',           'label' => 'Apellido'],
            ['key' => 'phone_number',       'label' => 'Teléfono'],
            ['key' => 'birthdate',          'label' => 'Fecha de nacimiento',     'sortable' => false],
            ['key' => 'genre',              'label' => 'Género'],
            ['key' => 'academic_level',     'label' => 'Nivel académico'],
            ['key' => 'marital_status',     'label' => 'Estado civil'],
            ['key' => 'children',           'label' => 'Hijos'],
            ['key' => 'people_depending',   'label' => 'Personas dependientes'],
            ['key' => 'transportation',     'label' => 'Transporte'],
            ['key' => 'hiring_date',        'label' => 'Fecha de contratación',   'sortable' => false],
            ['key' => 'branch_division',    'label' => 'Depto. Sucursal',       'sortable' => false],
            ['key' => 'branch_subdivision', 'label' => 'Mun. Sucursal',      'sortable' => false],
            ['key' => 'position',           'label' => 'Puesto'],
            ['key' => 'diseases',                     'label' => 'Enfermedades crónicas'],
            ['key' => 'informed_consent',             'label' => 'Consentimiento informado', 'sortable' => false],
            ['key' => 'emotional_social_session',     'label' => 'Taller Inteligencia Emocional y Social',            'sortable' => false],
            ['key' => 'emotional_management_session', 'label' => 'Taller Herramientas para el manejo de las emociones',  'sortable' => false],
            ['key' => 'created_at',                   'label' => 'Fecha Registro',           'sortable' => false],
        ];

        $rows = $employees->getCollection()->map(fn($e) => [
            'id'                 => $e->id,
            'name'               => $e->name,
            'lastname'           => $e->lastname,
            'phone_number'       => $e->phone_number,
            'birthdate'          => $e->birthdate?->format('d/m/Y') ?? 'N/A',
            'genre'              => $e->genre,
            'academic_level'     => $e->academic_level,
            'marital_status'     => $e->marital_status,
            'children'           => $e->children,
            'people_depending'   => $e->people_depending,
            'transportation'     => $e->transportation,
            'hiring_date'        => $e->hiring_date?->format('m/Y') ?? 'N/A',
            'branch_division'    => $e->branchDivision?->name ?? 'N/A',
            'branch_subdivision' => $e->branchSubdivision?->name ?? 'N/A',
            'position'           => $e->position,
            'diseases'                     => $e->diseases->pluck('name')->join(', ') ?: 'Ninguna',
            'informed_consent'             => $e->informed_consent ? 'Aceptó' : 'No aceptó',
            'emotional_social_session'     => $e->emotional_social_session ? 'Asistió' : 'No asistió',
            'emotional_management_session' => $e->emotional_management_session ? 'Asistió' : 'No asistió',
            'created_at'                   => $e->created_at?->format('d/m/Y H:i') ?? 'N/A',
        ]);

        return view('livewire.employees-report', [
            'headers'    => $headers,
            'rows'       => $rows,
            'paginator'  => $employees,
            'exportUrl'  => route('batteries.report.employees.export', ['search' => $this->search]),
        ]);
    }
}
