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
use Livewire\Attributes\Rule;
use Livewire\Component;

class PostJobEdit extends Component
{
    public $detail;

    #[Rule('required|min:3')]
    public  $job_headline, $annual_salary, $locality, $functional_area, $reference_code, $vacancy, $company_name, $company_detail;

    #[Rule('required')]
    public $employment_type, $work_experience, $key_skill, $location, $industry, $role, $education_qualification, $company_type_id, $posted_by, $work_mode, $department;

    public $job_description, $salary_hide_status, $job_edit_id, $status;

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
        $this->status = $this->detail->status;
        $this->job_edit_id = $this->detail->id;
    }

    public function update()
    {
        $post_job_detail = PostJob::with('location', 'industry', 'role', 'education', 'companyType', 'postedBy', 'workMode', 'department', 'workExperience')->find($this->job_edit_id);
        $post_job_detail->job_headline = $this->job_headline;
        $post_job_detail->employment_type = $this->employment_type;
        $post_job_detail->job_description = $this->job_description;
        $post_job_detail->key_skill = $this->key_skill;
        $post_job_detail->work_experience = $this->work_experience;
        $post_job_detail->annual_salary = $this->annual_salary;
        $post_job_detail->salary_hide_status = $this->salary_hide_status;
        $post_job_detail->location_id = $this->location;
        $post_job_detail->locality =  $this->locality;
        $post_job_detail->industry_id = $this->industry;
        $post_job_detail->functional_area = $this->functional_area;
        $post_job_detail->role_id = $this->role;
        $post_job_detail->reference_code = $this->reference_code;
        $post_job_detail->vacancy = $this->vacancy;
        $post_job_detail->education_qualification_id = $this->education_qualification;
        $post_job_detail->company_name = $this->company_name;
        $post_job_detail->company_detail = $this->company_detail;
        $post_job_detail->company_type_id = $this->company_type_id;
        $post_job_detail->posted_by_id = $this->posted_by;
        $post_job_detail->work_mode_id = $this->work_mode;
        $post_job_detail->department_id = $this->department;
        $post_job_detail->status = $this->status;
        $post_job_detail->save();

        session()->flash('message', 'Job updated sucessfully');
        return redirect()->to('/admin/post-job');
    }

    public function render()
    {
        return view('livewire.admin.post-job.post-job-edit', [
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
