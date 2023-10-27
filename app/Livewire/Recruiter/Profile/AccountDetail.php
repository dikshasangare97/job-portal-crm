<?php

namespace App\Livewire\Recruiter\Profile;

use App\Models\User;
use Livewire\Component;

class AccountDetail extends Component
{
    public $name, $email, $register_for, $designation, $contact_number, $street_address, $pin_code;

    public function mount()
    {
        $user_detail = User::find(auth()->user()->id);
        $this->name = $user_detail->name;
        $this->email = $user_detail->email;
        $this->register_for =  $user_detail->register_for;
        $this->designation = $user_detail->designation;
        $this->contact_number =  $user_detail->contact_number;
        $this->street_address =  $user_detail->street_address;
        $this->pin_code =  $user_detail->pin_code;
    }

    public function updateAccount()
    {
        $user_detail = User::find(auth()->user()->id);
        $user_detail->name = $this->name;
        $user_detail->email = $this->email;
        $user_detail->register_for = $this->register_for;
        $user_detail->designation = $this->designation;
        $user_detail->contact_number = $this->contact_number;
        $user_detail->street_address = $this->street_address;
        $user_detail->pin_code = $this->pin_code;
        $user_detail->save();
        session()->flash('recruiteraccountmsg', 'Account details updated sucessfully');
        return redirect()->to('/user/profile');
    }

    public function render()
    {
        return view('livewire.recruiter.profile.account-detail');
    }
}
