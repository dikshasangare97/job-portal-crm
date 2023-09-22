<?php

namespace App\Livewire\Recruiter\Job;

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
use Livewire\Attributes\Rule;
use Livewire\Component;

class JobEdit extends Component
{
    public $detail;

    #[Rule('required|min:3')]
    public  $job_headline;

    #[Rule('required|min:3')]
    public  $employment_type;

    #[Rule('required|min:3')]
    public  $job_description;

    #[Rule('required|min:3')]
    public  $key_skill;

    #[Rule('required')]
    public  $work_experience;

    #[Rule('required|min:3')]
    public  $annual_salary;

    public  $salary_hide_status;

    #[Rule('required')]
    public  $location;

    #[Rule('required|min:3')]
    public  $locality;

    #[Rule('required')]
    public  $industry;

    #[Rule('required|min:3')]
    public  $functional_area;

    #[Rule('required')]
    public  $role;

    #[Rule('required|min:3')]
    public  $reference_code;

    #[Rule('required|min:3')]
    public  $vacancy;

    #[Rule('required')]
    public  $education_qualification;

    #[Rule('required|min:3')]
    public  $company_name;

    #[Rule('required|min:3')]
    public  $company_detail;
    public $company_type_id;
    public $posted_by;
    public $work_mode;
    public $department;

    public function mount($id)
    {
        $this->detail = PostJob::with('location', 'industry', 'role', 'education', 'companyType', 'postedBy', 'workMode', 'department', 'workExperience')->find($id);
        $this->job_headline = $this->detail->job_headline;
        $this->employment_type = $this->detail->employment_type;
        $this->job_description = $this->detail->job_description;
        $this->key_skill = $this->detail->key_skill;
        $this->work_experience = $this->detail->workExperience->id;
        $this->annual_salary = $this->detail->annual_salary;
        $this->salary_hide_status = $this->detail->salary_hide_status;
        $this->location = $this->detail->location->id;
        $this->locality = $this->detail->locality;
        $this->industry = $this->detail->industry->id;
        $this->functional_area = $this->detail->functional_area;
        $this->role = $this->detail->role->id;
        $this->reference_code = $this->detail->reference_code;
        $this->vacancy = $this->detail->vacancy;
        $this->education_qualification = $this->detail->education->id;
        $this->company_name = $this->detail->company_name;
        $this->company_detail = $this->detail->company_detail;
        $this->company_type_id = $this->detail->companyType->id;
        $this->posted_by = $this->detail->postedBy->id;
        $this->work_mode = $this->detail->workMode->id;
        $this->department = $this->detail->department->id;
    }

    public function render()
    {
        return view('livewire.recruiter.job.job-edit', [
            'job_detail' => $this->detail,
            'locations' => Location::where('status', 1)->get(),
            'industries' => Industry::where('status', 1)->get(),
            'roles' => Role::where('status', 1)->get(),
            'educations' => Education::where('status', 1)->get(),
            'company_types' => CompanyType::where('status', 1)->get(),
            'posted_bies' => JobPostedBy::where('status', 1)->get(),
            'work_modes' => Workmode::where('status', 1)->get(),
            'departments' => Departments::where('status', 1)->get(),
            'experiences' => Experience::where('status', 1)->get(),
        ]);
    }
}
