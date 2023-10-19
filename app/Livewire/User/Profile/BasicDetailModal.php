<?php

namespace App\Livewire\User\Profile;

use App\Models\Location;
use App\Models\User;
use App\Models\UserEmploymentDetail;
use App\Models\UserPersonalDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BasicDetailModal extends Component
{
    public $name, $contact_number;
    public $notice_period;
    public $salary;
    public $total_experience_year;
    public $total_experience_month;
    public $company_name;
    public $designation_name;
    public $current_location = 'India';
    public $current_location_name;
    public $current_employment;

    public function mount()
    {
        $userDetail = User::find(Auth::user()->id);
        $this->name = $userDetail->name;
        $this->contact_number = $userDetail->contact_number;
        $userPersonalDetail = UserPersonalDetail::where('user_id', Auth::user()->id)->first();
        $userEmployment = UserEmploymentDetail::where('user_id', Auth::user()->id)->orWhere('current_employment', 1)->with('location')->first();
        if ($userEmployment) {
            $this->notice_period = $userPersonalDetail->notice_period;
            $this->salary = $userEmployment->salary;
            $this->total_experience_year = $userPersonalDetail->total_experience_year;
            $this->total_experience_month = $userPersonalDetail->total_experience_month;
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
        return view('livewire.user.profile.basic-detail-modal', [
            'userPersonalDetail' =>  $userPersonalDetail,
            'userEmployment' => $userEmployment,
            'locations' => Location::where('status', 1)->get(),
        ]);
    }

    public function saveBasicDetail()
    {
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

        $userDetail = User::find(Auth::user()->id);
        if ($userDetail->name != $this->name || $userDetail->contact_number != $this->contact_number) {
            $userDetail->update([
                'name' => $this->name,
                'contact_number' => $this->contact_number,
            ]);
        }
        $userPersonalDetail = UserPersonalDetail::where('user_id', Auth::user()->id)->first();
        $userPersonalDetail->update([
            'current_location' => $this->current_location,
            'current_location_name' => $this->current_location_name,
            'notice_period' => $this->notice_period,
            'current_salary' => $salary,
            'total_experience_year' => $totalexperienceYear,
            'total_experience_month' => $totalexperienceMonth,
        ]);
        session()->flash('profilesummarymsg', 'Career profile has been successfully saved.');
        return redirect()->to('/user/profile');
    }
}
