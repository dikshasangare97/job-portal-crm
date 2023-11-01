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
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class JobPosting extends Component
{
    #[Rule('required|min:3')]
    public  $job_headline = '', $job_description = '', $company_name = '', $company_detail = '', $job_highlights = '';

    #[Rule('required')]
    public  $employment_type = '', $key_skill = '', $work_experience = '',  $location = '', $industry = '', $role = '', $education_qualification = '', $company_type_id = '', $posted_by = '', $vacancy = '', $work_mode = '', $department = '';

    public $salary_hide_status = '',  $annual_salary = '', $locality = '', $functional_area = '', $reference_code = '';

    public function resetInputFields()
    {
        $this->job_headline = '';
        $this->employment_type = '';
        $this->job_description = '';
        $this->key_skill = '';
        $this->work_experience = '';
        $this->annual_salary = '';
        $this->salary_hide_status = '';
        $this->location = '';
        $this->locality = '';
        $this->industry = '';
        $this->functional_area = '';
        $this->role = '';
        $this->reference_code = '';
        $this->vacancy = '';
        $this->education_qualification = '';
        $this->company_name = '';
        $this->company_detail = '';
        $this->company_type_id = '';
        $this->posted_by = '';
        $this->job_highlights = '';
    }

    public function store()
    {
        $this->validate();
        PostJob::create([
            'user_id' => Auth::user()->id,
            'job_headline' => $this->job_headline,
            'employment_type' => $this->employment_type,
            'job_description' => $this->job_description,
            'key_skill' => $this->key_skill,
            'work_experience' => $this->work_experience,
            'annual_salary' => $this->annual_salary ?? 0,
            'salary_hide_status' => $this->salary_hide_status,
            'location_id' => $this->location,
            'locality' => $this->locality,
            'industry_id' => $this->industry,
            'functional_area' => $this->functional_area,
            'role_id' => $this->role,
            'reference_code' => $this->reference_code,
            'vacancy' => $this->vacancy,
            'education_qualification_id' => $this->education_qualification,
            'company_name' => $this->company_name,
            'company_detail' => $this->company_detail,
            'company_type_id' => $this->company_type_id,
            'posted_by_id' => $this->posted_by,
            'work_mode_id' => $this->work_mode,
            'department_id' => $this->department,
            'status' => 1,
            'job_highlights' => $this->job_highlights,
        ]);
        session()->flash('message', 'Job created sucessfully');
        $this->resetInputFields();
        return redirect()->to('/recruiter/jobs');
    }
    public function render()
    {
        return view('livewire.recruiter.job.job-posting', [
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

    // for salary
    public function validateAndFormatSalary()
    {
        $this->validate([
            'annual_salary' => ['regex:/^[0-9,]+$/', 'numeric'],
        ]);
        $this->annual_salary = preg_replace('/[^0-9,]/', '', $this->annual_salary);
    }

    public function formatSalary()
    {
        $numericSalary = (float) preg_replace('/[^0-9]/', '', $this->annual_salary);
        $this->annual_salary = number_format($numericSalary, 0);
    }
}
