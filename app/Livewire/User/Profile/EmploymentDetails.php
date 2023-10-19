<?php

namespace App\Livewire\User\Profile;

use App\Models\Departments;
use App\Models\KeySkill;
use App\Models\Location;
use App\Models\UserEmploymentDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class EmploymentDetails extends Component
{
    #[Rule('required')]
    public $company_name = '';
    public $current_employment = 0, $employment_type = 0, $total_experience_year = '', $total_experience_month = '', $location = '', $department = '', $designation_name = '', $joining_date_year = '', $joining_date_month = '', $worked_till_year = '', $worked_till_month = '', $salary = '', $skill_used = [], $job_profile = '', $notice_period = '', $user_employment_id;

    public function render()
    {
        $userEmploymentDetails = UserEmploymentDetail::with('user', 'location', 'department', 'userSkill')->where('user_id', Auth::user()->id)->get();
        return view('livewire.user.profile.employment-details', [
            'key_skills' => KeySkill::where('status', 1)->get(),
            'locations' => Location::where('status', 1)->get(),
            'departments' => Departments::where('status', 1)->get(),
            'employment_details' => $userEmploymentDetails,
        ]);
    }

    public function showCurrentEmployment()
    {
        $this->current_employment  != $this->current_employment;
    }

    public function showEmploymentType()
    {
        $this->employment_type  != $this->employment_type;
    }

    public function validateAndFormatSalary()
    {
        $value = preg_replace('/[^0-9,]/', '', $this->salary);
        if ($value !== $this->salary) {
            $this->salary = $value;
            $this->addError('salary', 'The salary field must be a number.');
        } else {
            $this->resetErrorBag('salary');
        }
    }

    public function formatSalary()
    {
        $this->salary = preg_replace('/[^0-9]/', '', $this->salary);
        $this->salary = number_format($this->salary, 0);
    }

    public function getSkillNames($skillUsed)
    {
        if ($skillUsed) {
            $skillIds = json_decode($skillUsed);
            $skillNames = [];
            foreach ($skillIds as $skillId) {
                if (count($skillNames) >= 5) {
                    break;
                }
                $keySkill = KeySkill::where('id', $skillId)->first();
                if ($keySkill) {
                    $skillNames[] = $keySkill->key_skill_name;
                }
            }
            return !empty($skillNames) ? implode(', ', $skillNames) : '-';
        }
    }

    public function saveEmploymentDetail()
    {
        $this->validate();
        if ($this->location == '') {
            $location = null;
        } else {
            $location = $this->location;
        }

        if ($this->department == '') {
            $department = null;
        } else {
            $department = $this->department;
        }

        if ($this->worked_till_year == '') {
            $worked_till_year = null;
        } else {
            $worked_till_year = $this->worked_till_year;
        }

        if ($this->worked_till_month == '') {
            $worked_till_month = null;
        } else {
            $worked_till_month = $this->worked_till_month;
        }

        if ($this->total_experience_year == '') {
            $total_experience_year = null;
        } else {
            $total_experience_year = $this->total_experience_year;
        }

        if ($this->total_experience_month == '') {
            $total_experience_month = null;
        } else {
            $total_experience_month = $this->total_experience_month;
        }

        if ($this->salary == '') {
            $salary = null;
        } else {
            $salary = $this->salary;
        }

        if ($this->skill_used == '') {
            $skill_used = null;
        } else {
            $skill_used = json_encode($this->skill_used);
        }
        UserEmploymentDetail::create([
            'user_id' => Auth::user()->id,
            'current_employment' => $this->current_employment,
            'employment_type' => $this->employment_type,
            'total_experience_year' => $total_experience_year,
            'total_experience_month' => $total_experience_month,
            'company_name' => $this->company_name ?? null,
            'location' => $location,
            'department' => $department,
            'designation_name' => $this->designation_name ?? null,
            'joining_date_year' => $this->joining_date_year ?? null,
            'joining_date_month' => $this->joining_date_month ?? null,
            'worked_till_year' => $worked_till_year,
            'worked_till_month' => $worked_till_month,
            'salary' => $salary,
            'skill_used' =>  $skill_used,
            'job_profile' => $this->job_profile ?? null,
            'notice_period' => $this->notice_period ?? null,
        ]);
        session()->flash('employmentmessage', 'Employment details has been successfully saved.');
        return redirect()->to('/user/profile');
    }

    public function getEmploymentId($id)
    {
        $this->user_employment_id = $id;
    }

    public function deleteEmployment()
    {
        UserEmploymentDetail::find($this->user_employment_id)->delete();
        session()->flash('employmentmessage', 'Employment detail deleted sucessfully');
        return redirect()->to('/user/profile');
    }
}
