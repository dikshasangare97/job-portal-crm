<?php

namespace App\Livewire\User\Profile;

use App\Models\UserPersonalDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class PersonalDetails extends Component
{
    public $detail;

    public $gender = '';
    public $marital_status = '';
    public $category = '';
    public $date_of_birth;
    public $differently_abled = 0;
    public $career_break = 0;
    public $work_permit_usa;
    public $work_permit_country;
    public $permanent_address = '';
    public $hometown = '';
    #[Rule('numeric|digits:6')]
    public $pincode = '';

    public function mount()
    {
        $this->detail = UserPersonalDetail::with('location')->where('user_id', Auth::user()->id)->first();
        if ($this->detail->gender) {
            $this->gender = $this->detail->gender;
            $this->marital_status = $this->detail->marital_status;
            $this->category = $this->detail->category;
            $this->date_of_birth = $this->detail->date_of_birth;
            $this->differently_abled = $this->detail->differently_abled;
            $this->career_break = $this->detail->career_break;
            $this->work_permit_usa = $this->detail->work_permit_usa;
            $this->work_permit_country = $this->detail->work_permit_country;
            $this->permanent_address = $this->detail->permanent_address;
            $this->hometown = $this->detail->hometown;
            $this->pincode = $this->detail->pincode;
        }
    }

    public function render()
    {
        $userPersonalDetail = UserPersonalDetail::with('location')->where('user_id', Auth::user()->id)->first();
        return view('livewire.user.profile.personal-details', [
            'userPersonalDetail' => $userPersonalDetail
        ]);
    }

    public function savePersonalDetail()
    {
        $this->validate();
        $userPersonalDetail = UserPersonalDetail::where('user_id', Auth::user()->id)->first();
        if ($userPersonalDetail) {
            $userPersonalDetail->update([
                'gender' => $this->gender,
                'marital_status' => $this->marital_status,
                'date_of_birth' => $this->date_of_birth,
                'category' => $this->category,
                'differently_abled' => $this->differently_abled,
                'career_break' => $this->career_break,
                'work_permit_usa' => $this->work_permit_usa ?? null,
                'work_permit_country' => $this->work_permit_country ?? 'India',
                'permanent_address' => $this->permanent_address,
                'hometown' => $this->hometown,
                'pincode' => $this->pincode,
            ]);
        } else {
            UserPersonalDetail::create([
                'user_id' => Auth::user()->id,
                'gender' => $this->gender,
                'marital_status' => $this->marital_status,
                'date_of_birth' => $this->date_of_birth,
                'category' => $this->category,
                'differently_abled' => $this->differently_abled,
                'career_break' => $this->career_break,
                'work_permit_usa' => $this->work_permit_usa ?? null,
                'work_permit_country' => $this->work_permit_country ?? 'India',
                'permanent_address' => $this->permanent_address,
                'hometown' => $this->hometown,
                'pincode' => $this->pincode,
            ]);
        }
        session()->flash('personaldetailmessage', 'Personal detail has been successfully saved.');
        return redirect()->to('/user/profile');
    }
}
