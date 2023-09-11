<?php

namespace App\Livewire\Job;

use App\Models\CompanyType;
use App\Models\Education;
use App\Models\Industry;
use App\Models\Job;
use App\Models\Location;
use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class JobIndex extends Component
{
    use WithPagination;
    public $records;

    public $selectedEducations = [];
    public $selectedLocations = [];
    public $selectedCompanyTypes = [];
    public $selectedRoleCategories = [];
    public $selectedIndustries = [];
    public $jobs;


    public function mount($search)
    {
        $this->records = Job::orderby('id', 'DESC')
            ->where('job_headline', 'like', '%' . $search . '%')
            ->orWhere('employment_type', 'like', '%' . $search . '%')
            ->orWhere('key_skill', 'like', '%' . $search . '%')->get();
    }

    public function  render()
    {
        $this->jobs = Job::where(function ($query) {
            $query->whereIn('education_qualification', $this->selectedEducations)
                ->orWhereIn('location', $this->selectedLocations)
                // ->orWhereIn('education_qualification', $this->selectedCompanyTypes)
                ->orWhereIn('role', $this->selectedRoleCategories)
                ->orWhereIn('industry', $this->selectedIndustries);
        })->get();

        return view('livewire.job.job-index', [
            'jobs' =>  $this->jobs,
            'getJobs' =>  $this->records,
            'educations' => Education::orderBy('id', 'DESC')->get(),
            'locations' => Location::orderBy('id', 'DESC')->get(),
            'company_types' => CompanyType::orderBy('id', 'DESC')->get(),
            'role_categories' => Role::orderBy('id', 'DESC')->get(),
            'industries' => Industry::orderBy('id', 'DESC')->get(),
        ]);
    }

    public function toggleEducation($educationId)
    {
        if (!is_array($this->selectedEducations)) {
            $this->selectedEducations = [];
        }

        if (in_array($educationId, $this->selectedEducations)) {
            $this->selectedEducations = array_diff($this->selectedEducations, [$educationId]);
        } else {
            $this->selectedEducations[] = $educationId;
        }
    }


    public function toggleLocation($locationId)
    {
        if (!is_array($this->selectedLocations)) {
            $this->selectedLocations = [];
        }

        if (in_array($locationId, $this->selectedLocations)) {
            $this->selectedLocations = array_diff($this->selectedLocations, [$locationId]);
        } else {
            $this->selectedLocations[] = $locationId;
        }
    }

    public function toggleRoleCategory($roleCategoryId)
    {
        if (!is_array($this->selectedRoleCategories)) {
            $this->selectedRoleCategories = [];
        }

        if (in_array($roleCategoryId, $this->selectedRoleCategories)) {
            $this->selectedRoleCategories = array_diff($this->selectedRoleCategories, [$roleCategoryId]);
        } else {
            $this->selectedRoleCategories[] = $roleCategoryId;
        }
    }

    public function toggleIndustry($industryId)
    {
        if (!is_array($this->selectedIndustries)) {
            $this->selectedIndustries = [];
        }

        if (in_array($industryId, $this->selectedIndustries)) {
            $this->selectedIndustries = array_diff($this->selectedIndustries, [$industryId]);
        } else {
            $this->selectedIndustries[] = $industryId;
        }
    }
}
