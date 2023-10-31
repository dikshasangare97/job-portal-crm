<?php

namespace App\Livewire\User\Profile;

use App\Models\Departments;
use App\Models\Industry;
use App\Models\JobRole;
use App\Models\Location;
use App\Models\Role;
use App\Models\UserPersonalDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CareerProfile extends Component
{
    public $detail;
    public $expected_salary;
    public $preferred_work_location = '';
    public $desired_job_type = 'Permanent';
    public $desired_employment_type = 'Full time';
    public $preferred_shift = 'Day';

    #[Rule('required')]
    public $industry = '';
    #[Rule('required')]
    public $department = '';
    #[Rule('required')]
    public $role_category = '';
    #[Rule('required')]
    public $job_role = '';

    public function mount()
    {
        $this->detail = UserPersonalDetail::with('user', 'industry', 'department', 'roleCategory', 'jobRole', 'location')->where('user_id', Auth::user()->id)->first();
        if ($this->detail->industry_id) {
            $this->industry = $this->detail->industry->id;
            $this->department = $this->detail->department->id;
            $this->role_category = $this->detail->roleCategory->id;
            $this->job_role = $this->detail->jobRole->id;
            $this->preferred_work_location = $this->detail->location->id;
            $this->expected_salary = $this->detail->expected_salary;
            $this->desired_job_type = $this->detail->desired_job_type;
            $this->desired_employment_type = $this->detail->desired_employment_type;
            $this->preferred_shift = $this->detail->preferred_shift;
        }
    }

    public function validateAndFormatSalary()
    {
        $this->validate([
            'expected_salary' => ['regex:/^[0-9,]+$/', 'numeric'],
        ]);
        $this->expected_salary = preg_replace('/[^0-9,]/', '', $this->expected_salary);
    }

    public function formatSalary()
    {
        $numericSalary = (float) preg_replace('/[^0-9]/', '', $this->expected_salary);
        $this->expected_salary = number_format($numericSalary, 0);
    }

    public function render()
    {
        $userPersonalDetail = UserPersonalDetail::with('user', 'industry', 'department', 'roleCategory', 'jobRole', 'location')->where('user_id', Auth::user()->id)->first();
        return view('livewire.user.profile.career-profile', [
            'userPersonalDetail' => $userPersonalDetail,
            'locations' => Location::where('status', 1)->get(),
            'industries' => Industry::where('status', 1)->get(),
            'role_categories' => Role::where('status', 1)->get(),
            'departments' => Departments::where('status', 1)->get(),
            'job_roles' => JobRole::where('status', 1)->get(),
        ]);
    }

    public function saveCareerDetail()
    {
        $this->validate();
        $userPersonalDetail = UserPersonalDetail::where('user_id', Auth::user()->id)->first();
        if ($userPersonalDetail) {
            $userPersonalDetail->update([
                'industry_id' => $this->industry,
                'department_id' => $this->department,
                'role_category_id' => $this->role_category,
                'job_role_id' => $this->job_role,
                'preferred_work_location' => $this->preferred_work_location,
                'expected_salary' => $this->expected_salary,
                'desired_job_type' => $this->desired_job_type,
                'desired_employment_type' => $this->desired_employment_type,
                'preferred_shift' => $this->preferred_shift,
            ]);
        } else {
            UserPersonalDetail::create([
                'user_id' => Auth::user()->id,
                'industry_id' => $this->industry,
                'department_id' => $this->department,
                'role_category_id' => $this->role_category,
                'job_role_id' => $this->job_role,
                'preferred_work_location' => $this->preferred_work_location,
                'expected_salary' => $this->expected_salary,
                'desired_job_type' => $this->desired_job_type,
                'desired_employment_type' => $this->desired_employment_type,
                'preferred_shift' => $this->preferred_shift,
            ]);
        }
        session()->flash('profilesummarymsg', 'Career profile has been successfully saved.');
        return redirect()->to('/user/profile');
    }
}
