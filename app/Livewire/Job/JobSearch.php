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
    public $selectedSalary = [];
    public $selectedFreshnesses = [];
    public $jobs;
    public $search;

    public $clearFilterBtn = false;

    public function mount($search)
    {
        $this->records = PostJob::orderby('id', 'DESC')->where('job_headline', 'like', '%' . $search . '%')->orWhere('employment_type', 'like', '%' . $search . '%')->orWhere('key_skill', 'like', '%' . $search . '%')->get();
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
        $this->jobs = PostJob::query()->where('job_headline', 'like', '%' . $this->search . '%')
            ->with('location', 'industry', 'role', 'education', 'companyType')->when($this->selectedEducations, function ($query) {
                $query->where(function ($query) {
                    $query->whereIn('education_qualification_id', $this->selectedEducations);
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
                        $query->where('annual_salary', '>=', $minSalary)
                            ->where('annual_salary', '<=', $maxSalary);
                    });
                }
            })->when($this->selectedFreshnesses, function ($query) {
                $freshnessIds = array_map('intval', $this->selectedFreshnesses);
                $date = Carbon::now()->subDays($freshnessIds[0]);
                $query->where('created_at', '>=', $date);
            })->orderBy('id', 'DESC')->get();
        return view('livewire.job.job-search', ['jobs' =>  $this->jobs, 'getJobs' =>  $this->records, 'educations' => Education::get(), 'locations' => Location::get(), 'company_types' => CompanyType::get(), 'role_categories' => Role::get(), 'industries' => Industry::get(), 'posted_bies' => JobPostedBy::get(), 'workmodes' => Workmode::get(), 'departments' => Departments::get(), 'experiences' => Experience::get(),]);
    }

    public function toggleEducation($educationId)
    {
        $this->clearFilterBtn = true;
        if (in_array($educationId, $this->selectedEducations)) {
            $this->selectedEducations = array_diff($this->selectedEducations, [$educationId]);
        } else {
            $this->selectedEducations[] = $educationId;
        }
    }

    public function toggleLocation($locationId)
    {
        // if (!is_array($this->selectedLocations)) {
        //     $this->selectedLocations = [];
        // }
        $this->clearFilterBtn = true;
        if (in_array($locationId, $this->selectedLocations)) {
            $this->selectedLocations = array_diff($this->selectedLocations, [$locationId]);
        } else {
            $this->selectedLocations[] = $locationId;
        }
    }

    public function toggleRoleCategory($roleCategoryId)
    {
        $this->clearFilterBtn = true;
        if (in_array($roleCategoryId, $this->selectedRoleCategories)) {
            $this->selectedRoleCategories = array_diff($this->selectedRoleCategories, [$roleCategoryId]);
        } else {
            $this->selectedRoleCategories[] = $roleCategoryId;
        }
    }

    public function toggleIndustry($industryId)
    {
        $this->clearFilterBtn = true;
        if (in_array($industryId, $this->selectedIndustries)) {
            $this->selectedIndustries = array_diff($this->selectedIndustries, [$industryId]);
        } else {
            $this->selectedIndustries[] = $industryId;
        }
    }

    public function togglePostedJob($postedById)
    {
        $this->clearFilterBtn = true;
        if (in_array($postedById, $this->selectedPostedBy)) {
            $this->selectedPostedBy = array_diff($this->selectedPostedBy, [$postedById]);
        } else {
            $this->selectedPostedBy[] = $postedById;
        }
    }

    public function toggleExperience($experienceId)
    {
        $this->clearFilterBtn = true;
        if (in_array($experienceId, $this->selectedExperiences)) {
            $this->selectedExperiences = array_diff($this->selectedExperiences, [$experienceId]);
        } else {
            $this->selectedExperiences[] = $experienceId;
        }
    }

    public function toggleWorkmode($workmodeId)
    {
        $this->clearFilterBtn = true;
        if (in_array($workmodeId, $this->selectedWorkmodes)) {
            $this->selectedWorkmodes = array_diff($this->selectedWorkmodes, [$workmodeId]);
        } else {
            $this->selectedWorkmodes[] = $workmodeId;
        }
    }

    public function toggleDepartment($departmentId)
    {
        $this->clearFilterBtn = true;
        if (in_array($departmentId, $this->selectedDepartments)) {
            $this->selectedDepartments = array_diff($this->selectedDepartments, [$departmentId]);
        } else {
            $this->selectedDepartments[] = $departmentId;
        }
    }

    public function toggleSalary($salaryRange)
    {
        $this->clearFilterBtn = true;
        if (in_array($salaryRange, $this->selectedSalary)) {
            $this->selectedSalary = array_diff($this->selectedSalary, [$salaryRange]);
        } else {
            $this->selectedSalary[] = $salaryRange;
        }
    }

    public function toggleFreshness($freshnessId)
    {
        $this->clearFilterBtn = true;
        if (in_array($freshnessId, $this->selectedFreshnesses)) {
            $this->selectedFreshnesses = array_diff($this->selectedFreshnesses, [$freshnessId]);
        } else {
            $this->selectedFreshnesses[] = $freshnessId;
        }
    }

    public function clearFilter()
    {
        $this->clearFilterBtn = false;
        $this->resetFilters();
    }
}
