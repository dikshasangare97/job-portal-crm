<?php

namespace App\Livewire\Job;

use App\Models\CompanyType;
use App\Models\Education;
use App\Models\Industry;
use App\Models\Location;
use App\Models\PostJob;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class JobCreate extends Component
{

    #[Rule('required|min:3')]
    public  $job_headline = '';

    #[Rule('required|min:3')]
    public  $employment_type = '';

    #[Rule('required|min:3')]
    public  $job_description = '';

    #[Rule('required|min:3')]
    public  $key_skill = '';

    #[Rule('required|min:3')]
    public  $work_experience = '';

    #[Rule('required|min:3')]
    public  $annual_salary = '';

    public  $salary_hide_status = '';

    #[Rule('required')]
    public  $location = '';

    #[Rule('required|min:3')]
    public  $locality = '';

    #[Rule('required')]
    public  $industry = '';

    #[Rule('required|min:3')]
    public  $functional_area = '';

    #[Rule('required')]
    public  $role = '';

    #[Rule('required|min:3')]
    public  $reference_code = '';

    #[Rule('required|min:3')]
    public  $vacancy = '';

    #[Rule('required')]
    public  $education_qualification = '';

    #[Rule('required|min:3')]
    public  $company_name = '';

    #[Rule('required|min:3')]
    public  $company_detail = '';
    public $company_type_id = '';
    public $posted_by = '';

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
            'annual_salary' => $this->annual_salary,
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
            'posted_by' => $this->posted_by,
        ]);
        session()->flash('message', 'Job created sucessfully');
        $this->resetInputFields();
        return redirect('/recruiter/job-posting');
    }
    public function render()
    {
        return view('livewire.job.job-create', [
            'locations' => Location::where('status', 1)->get(),
            'industries' => Industry::where('status', 1)->get(),
            'roles' => Role::where('status', 1)->get(),
            'educations' => Education::where('status', 1)->get(),
            'company_types' => CompanyType::where('status', 1)->get(),
        ]);
    }
}
