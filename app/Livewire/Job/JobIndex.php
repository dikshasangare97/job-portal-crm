<?php

namespace App\Livewire\Job;

use App\Models\CompanyType;
use App\Models\Departments;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Industry;
use App\Models\JobPostedBy;
use App\Models\Location;
use App\Models\PostJob;
use App\Models\Role;
use App\Models\Workmode;
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
    public $selectedPostedBy = [];
    public $selectedExperiences = [];
    public $selectedWorkmodes = [];
    public $selectedDepartments = [];
    public $jobs;
    public $search;

    public function mount($search)
    {
        $this->records = PostJob::orderby('id', 'DESC')
            ->where('job_headline', 'like', '%' . $search . '%')
            ->orWhere('employment_type', 'like', '%' . $search . '%')
            ->orWhere('key_skill', 'like', '%' . $search . '%')->get();
    }

    public function  render()
    {
        $this->jobs = PostJob::where('job_headline', 'like', '%' . $this->search . '%')->where(function ($query) {
            $query->whereIn('education_qualification_id', $this->selectedEducations)
                ->orWhereIn('location_id', $this->selectedLocations)
                ->orWhereIn('company_type_id', $this->selectedCompanyTypes)
                ->orWhereIn('role_id', $this->selectedRoleCategories)
                ->orWhereIn('industry_id', $this->selectedIndustries)
                ->orWhereIn('posted_by_id', $this->selectedPostedBy)
                ->orWhereIn('work_mode_id', $this->selectedWorkmodes)
                ->orWhereIn('department_id', $this->selectedDepartments)
                ->orWhereIn('work_experience', $this->selectedExperiences);
        })->with('location', 'industry', 'role', 'education', 'companyType')->get();

        return view('livewire.job.job-index', [
            'jobs' =>  $this->jobs,
            'getJobs' =>  $this->records,
            'educations' => Education::get(),
            'locations' => Location::get(),
            'company_types' => CompanyType::get(),
            'role_categories' => Role::get(),
            'industries' => Industry::get(),
            'posted_bies' => JobPostedBy::get(),
            'workmodes' => Workmode::get(),
            'departments' => Departments::get(),
            'experiences' => Experience::get(),
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

    public function togglePostedJob($postedById)
    {
        if (!is_array($this->selectedPostedBy)) {
            $this->selectedPostedBy = [];
        }

        if (in_array($postedById, $this->selectedPostedBy)) {
            $this->selectedPostedBy = array_diff($this->selectedPostedBy, [$postedById]);
        } else {
            $this->selectedPostedBy[] = $postedById;
        }
    }

    public function toggleExperience($experienceId)
    {
        if (!is_array($this->selectedExperiences)) {
            $this->selectedExperiences = [];
        }

        if (in_array($experienceId, $this->selectedExperiences)) {
            $this->selectedExperiences = array_diff($this->selectedExperiences, [$experienceId]);
        } else {
            $this->selectedExperiences[] = $experienceId;
        }
    }

    public function toggleWorkmode($workmodeId)
    {
        if (!is_array($this->selectedWorkmodes)) {
            $this->selectedWorkmodes = [];
        }

        if (in_array($workmodeId, $this->selectedWorkmodes)) {
            $this->selectedWorkmodes = array_diff($this->selectedWorkmodes, [$workmodeId]);
        } else {
            $this->selectedWorkmodes[] = $workmodeId;
        }
    }

    public function toggleDepartment($departmentId)
    {
        if (!is_array($this->selectedDepartments)) {
            $this->selectedDepartments = [];
        }

        if (in_array($departmentId, $this->selectedDepartments)) {
            $this->selectedDepartments = array_diff($this->selectedDepartments, [$departmentId]);
        } else {
            $this->selectedDepartments[] = $departmentId;
        }
    }
}
