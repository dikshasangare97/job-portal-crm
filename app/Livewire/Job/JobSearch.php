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
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class JobSearch extends Component
{
    use WithPagination;
    public $records, $search, $clearFilterBtn = false, $selectedEducations = [], $selectedLocations = [], $selectedCompanyTypes = [], $selectedRoleCategories = [], $selectedIndustries = [], $selectedPostedBy = [], $selectedExperiences = [], $selectedWorkmodes = [], $selectedDepartments = [], $selectedSalary = [], $selectedFreshnesses = [];

    public function mount($search)
    {
        $this->records = $search;  // PostJob::orderby('id', 'DESC')->where('job_headline', 'like', '%' . $search . '%')->orWhere('employment_type', 'like', '%' . $search . '%')->orWhere('key_skill', 'like', '%' . $search . '%')->get();
    }

    public function resetFilters()
    {
        $this->selectedEducations = [];
        $this->selectedLocations = [];
        $this->selectedCompanyTypes = [];
        $this->selectedRoleCategories = [];
        $this->selectedIndustries = [];
        $this->selectedPostedBy = [];
        $this->selectedExperiences = [];
        $this->selectedWorkmodes = [];
        $this->selectedDepartments = [];
        $this->selectedSalary = [];
        $this->selectedFreshnesses = [];
    }

    public function  render()
    {
        $getPostedjobs = PostJob::where('job_headline', 'like', '%' . $this->search . '%')->with('location', 'industry', 'role', 'education', 'companyType')->when($this->selectedEducations, function ($query) {
            $query->where(function ($query) {
                $query->orWhereIn('education_qualification_id', $this->selectedEducations);
            });
        })->when($this->selectedLocations, function ($query) {
            $query->where(function ($query) {
                $query->orWhereIn('location_id', $this->selectedLocations);
            });
        })->when($this->selectedCompanyTypes, function ($query) {
            $query->where(function ($query) {
                $query->orWhereIn('company_type_id', $this->selectedCompanyTypes);
            });
        })->when($this->selectedRoleCategories, function ($query) {
            $query->where(function ($query) {
                $query->orWhereIn('role_id', $this->selectedRoleCategories);
            });
        })->when($this->selectedIndustries, function ($query) {
            $query->where(function ($query) {
                $query->orWhereIn('industry_id', $this->selectedIndustries);
            });
        })->when($this->selectedPostedBy, function ($query) {
            $query->where(function ($query) {
                $query->orWhereIn('posted_by_id', $this->selectedPostedBy);
            });
        })->when($this->selectedWorkmodes, function ($query) {
            $query->where(function ($query) {
                $query->orWhereIn('work_mode_id', $this->selectedWorkmodes);
            });
        })->when($this->selectedDepartments, function ($query) {
            $query->where(function ($query) {
                $query->orWhereIn('department_id', $this->selectedDepartments);
            });
        })->when($this->selectedExperiences, function ($query) {
            $query->where(function ($query) {
                $query->orWhereIn('work_experience', $this->selectedExperiences);
            });
        })->when($this->selectedSalary, function ($query) {
            foreach ($this->selectedSalary as $salaryRange) {
                list($minSalary, $maxSalary) = explode('-', $salaryRange);
                $query->where(function ($query) use ($minSalary, $maxSalary) {
                    $query->where('annual_salary', '>=', $minSalary)->where('annual_salary', '<=', $maxSalary);
                });
            }
        })->when($this->selectedFreshnesses, function ($query) {
            $freshnessIds = array_map('intval', $this->selectedFreshnesses);
            $date = Carbon::now()->subDays($freshnessIds[0]);
            $query->where('created_at', '>=', $date);
        })->orderBy('id', 'DESC')->paginate(15);
        return view('livewire.job.job-search', ['getPostedjobs' =>  $getPostedjobs, 'getJobs' =>  $this->records, 'educations' => Education::get(), 'locations' => Location::get(), 'company_types' => CompanyType::get(), 'role_categories' => Role::get(), 'industries' => Industry::get(), 'posted_bies' => JobPostedBy::get(), 'workmodes' => Workmode::get(), 'departments' => Departments::get(), 'experiences' => Experience::get()]);
    }

    public function toggleEducation($educationId)
    {
        if (!is_array($this->selectedEducations)) {
            $this->selectedEducations = [];
        }
        $this->clearFilterBtn = true;
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
        $this->clearFilterBtn = true;
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
        $this->clearFilterBtn = true;
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
        $this->clearFilterBtn = true;
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
        $this->clearFilterBtn = true;
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
        $this->clearFilterBtn = true;
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
        $this->clearFilterBtn = true;
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
        $this->clearFilterBtn = true;
        if (in_array($departmentId, $this->selectedDepartments)) {
            $this->selectedDepartments = array_diff($this->selectedDepartments, [$departmentId]);
        } else {
            $this->selectedDepartments[] = $departmentId;
        }
    }

    public function toggleSalary($salaryRange)
    {
        if (!is_array($this->selectedSalary)) {
            $this->selectedSalary = [];
        }
        $this->clearFilterBtn = true;
        if (in_array($salaryRange, $this->selectedSalary)) {
            $this->selectedSalary = array_diff($this->selectedSalary, [$salaryRange]);
        } else {
            $this->selectedSalary[] = $salaryRange;
        }
    }

    public function toggleFreshness($freshnessId)
    {
        if (!is_array($this->selectedFreshnesses)) {
            $this->selectedFreshnesses = [];
        }
        $this->clearFilterBtn = true;
        if (in_array($freshnessId, $this->selectedFreshnesses)) {
            $this->selectedFreshnesses = array_diff($this->selectedFreshnesses, [$freshnessId]);
        } else {
            $this->selectedFreshnesses[] = $freshnessId;
        }
    }

    public function toggleCompanyType($companytypeId)
    {
        if (!is_array($this->selectedCompanyTypes)) {
            $this->selectedCompanyTypes = [];
        }
        $this->clearFilterBtn = true;
        if (in_array($companytypeId, $this->selectedCompanyTypes)) {
            $this->selectedCompanyTypes = array_diff($this->selectedCompanyTypes, [$companytypeId]);
        } else {
            $this->selectedCompanyTypes[] = $companytypeId;
        }
    }

    public function clearFilter()
    {
        $this->clearFilterBtn = false;
        $this->resetFilters();
    }
}
