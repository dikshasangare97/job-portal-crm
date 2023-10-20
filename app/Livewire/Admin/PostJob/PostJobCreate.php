<?php

namespace App\Livewire\Admin\PostJob;

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

class PostJobCreate extends Component
{
    #[Rule('required|min:3')]
    public  $job_headline = '', $job_description = '', $annual_salary = '', $locality = '', $functional_area = '', $company_name = '', $company_detail = '';

    #[Rule('required')]
    public  $employment_type = '', $key_skill = '', $work_experience = '',  $location = '', $industry = '', $role = '', $education_qualification = '', $company_type_id = '', $posted_by = '', $vacancy = '';

    public $salary_hide_status = '';
    public $work_mode = '';
    public $department = '', $reference_code = '';

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
            'posted_by_id' => $this->posted_by,
            'work_mode_id' => $this->work_mode,
            'department_id' => $this->department,
        ]);
        session()->flash('message', 'Job created sucessfully');
        $this->resetInputFields();
        return redirect()->to('/admin/post-job');
    }

    public function render()
    {
        return view('livewire.admin.post-job.post-job-create', [
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
