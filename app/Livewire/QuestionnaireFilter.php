<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\EmployeeResponse;
use App\Models\VisitorResponse;
use Carbon\Carbon;

class QuestionnaireFilter extends Component
{
    public $businessUnit = '';
    public $group = 'employees';
    public $startDate;
    public $endDate;

    public $businessUnits = [];

    public function mount()
    {
        $this->loadBusinessUnits();

        // Default filters
        $this->group = 'employees';
        $this->businessUnit = '';
        $this->startDate = now()->toDateString();
        $this->endDate   = now()->toDateString();
    }

    public function updatedGroup()
    {
        // Reload business units only if group is employees
        if ($this->group === 'employees') {
            $this->loadBusinessUnits();
        } else {
            $this->businessUnits = []; // clear dropdown
            $this->businessUnit = ''; // reset filter
        }
    }

    protected function loadBusinessUnits()
    {
        $this->businessUnits = EmployeeResponse::select('business_unit')
            ->distinct()
            ->pluck('business_unit');
    }

    public function clearFilters()
    {
        $this->group = 'employees';
        $this->businessUnit = '';
        $this->startDate = now()->toDateString();
        $this->endDate   = now()->toDateString();
        $this->loadBusinessUnits();
    }

    public function render()
    {
        $results = collect();

        if ($this->group == 'employees') {
            $query = EmployeeResponse::query()
                ->with('respondent', 'questionnaire');

            if ($this->businessUnit) {
                $query->where('business_unit', $this->businessUnit);
            }

            if ($this->startDate && $this->endDate) {
                $query->whereBetween('created_at', [
                    Carbon::parse($this->startDate)->startOfDay(),
                    Carbon::parse($this->endDate)->endOfDay()
                ]);
            }

            $results = $query->get();

        } elseif ($this->group == 'visitors') {
            $query = VisitorResponse::query()
                ->with('respondent', 'questionnaire'); // assuming same structure

            if ($this->startDate && $this->endDate) {
                $query->whereBetween('created_at', [
                    Carbon::parse($this->startDate)->startOfDay(),
                    Carbon::parse($this->endDate)->endOfDay()
                ]);
            }

            $results = $query->get();
        }

        return view('livewire.questionnaire-filter', [
            'results' => $results
        ]);
    }
}
