<?php

namespace App\Livewire\User;

use App\Models\Location;
use App\Models\User;
use App\Models\UserEmploymentDetail;
use App\Models\UserPersonalDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $company_name = '', $current_employment = 0, $total_experience_year = '', $total_experience_month = '', $location = '';
    public $designation_name = '', $salary = '', $notice_period = '', $user_employment_id;
    public $resume, $current_location = 'India', $current_location_name;
    public $profile_image;

    public function mount()
    {
        $userPersonalDetail = UserPersonalDetail::where('user_id', Auth::user()->id)->first();
        $userEmployment = UserEmploymentDetail::where('user_id', Auth::user()->id)->orWhere('current_employment', 1)->with('location')->first();
        if ($userEmployment) {
            $this->notice_period = $userPersonalDetail->notice_period;
            $this->salary = $userEmployment->salary;
            $this->total_experience_year = $userEmployment->total_experience_year;
            $this->total_experience_month = $userEmployment->total_experience_month;
            $this->company_name = $userEmployment->company_name;
            $this->designation_name = $userEmployment->designation_name;
            $this->current_location_name = $userPersonalDetail->current_location_name;
            $this->current_employment = $userEmployment->current_employment;
        }
    }

    public function render()
    {
        $userPersonalDetail = UserPersonalDetail::where('user_id', Auth::user()->id)->first();
        $userEmployment = UserEmploymentDetail::where('user_id', Auth::user()->id)->orWhere('current_employment', 1)->with('location')->first();
        return view('livewire.user.profile', [
            'userPersonalDetail' =>  $userPersonalDetail,
            'userEmployment' => $userEmployment,
            'locations' => Location::where('status', 1)->get(),
        ]);
    }

    public function showCurrentEmployment()
    {
        $this->current_employment  != $this->current_employment;
    }

    public function validateAndFormatSalary()
    {
        $this->validate([
            'salary' => ['regex:/^[0-9,]+$/', 'numeric'],
        ]);
        $this->salary = preg_replace('/[^0-9,]/', '', $this->salary);
    }

    public function formatSalary()
    {
        $numericSalary = (float) preg_replace('/[^0-9]/', '', $this->salary);
        $this->salary = number_format($numericSalary, 0);
    }

    public function updateBasicDetail()
    {
        $this->validate([
            'resume' => 'nullable|mimes:doc,docx,pdf|max:2048',
            'company_name' => 'required',
            'current_location_name' => 'required',
            'designation_name' => 'required',
        ]);

        if ($this->total_experience_year == '') {
            $totalexperienceYear = null;
        } else {
            $totalexperienceYear = $this->total_experience_year;
        }

        if ($this->total_experience_month == '') {
            $totalexperienceMonth = null;
        } else {
            $totalexperienceMonth = $this->total_experience_month;
        }

        if ($this->salary == '') {
            $salary = null;
        } else {
            $salary = $this->salary;
        }

        if ($this->resume == null) {
            $resumeName = null;
        } else {
            $resumeName = $this->resume->getClientOriginalName();
            $this->resume->storeAs('public/resume', $resumeName);
        }

        $userPersonalDetail = UserPersonalDetail::where('user_id', Auth::user()->id)->first();
        if ($userPersonalDetail) {
            $userPersonalDetail->update([
                'resume' => $resumeName,
                'current_location' => $this->current_location,
                'current_location_name' => $this->current_location_name,
                'notice_period' => $this->notice_period,
                'current_salary' => $this->salary,
                'total_experience_year' => $totalexperienceYear,
                'total_experience_month' => $totalexperienceMonth,
            ]);
        } else {
            UserPersonalDetail::create([
                'user_id' => Auth::user()->id,
                'name' => Auth::user()->name,
                'resume' => $resumeName,
                'current_location' => $this->current_location,
                'current_location_name' => $this->current_location_name,
                'notice_period' => $this->notice_period,
                'current_salary' => $salary,
                'total_experience_year' => $totalexperienceYear,
                'total_experience_month' => $totalexperienceMonth,
            ]);
            UserEmploymentDetail::create([
                'user_id' => Auth::user()->id,
                'current_employment' => $this->current_employment,
                'total_experience_year' => $totalexperienceYear,
                'total_experience_month' => $totalexperienceMonth,
                'company_name' => $this->company_name ?? null,
                'designation_name' => $this->designation_name ?? null,
                'salary' => $salary,
                'notice_period' => $this->notice_period ?? null,
            ]);
        }

        session()->flash('basicdetailmessage', 'Basic details has been successfully saved.');
        return redirect()->to('/user/profile');
    }
}
