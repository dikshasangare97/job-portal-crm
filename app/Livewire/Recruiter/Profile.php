<?php

namespace App\Livewire\Recruiter;

use App\Models\UserCompanyDetail;
use Livewire\Component;

class Profile extends Component
{
    public $pan_number, $pan_number_name, $address_label, $company_address, $country, $state, $city, $company_pincode, $gstin_number;

    public function mount()
    {
        $other_detail = UserCompanyDetail::where('user_id', auth()->user()->id)->first();
        if ($other_detail) {
            $this->pan_number = $other_detail->pan_number;
            $this->pan_number_name = $other_detail->pan_number_name;
            $this->address_label =  $other_detail->address_label;
            $this->company_address = $other_detail->company_address;
            $this->country =  $other_detail->country;
            $this->state =  $other_detail->state;
            $this->city =  $other_detail->city;
            $this->company_pincode =  $other_detail->company_pincode;
            $this->gstin_number =  $other_detail->gstin_number;
        }
    }

    public function updateOtherDetail()
    {
        $other_detail = UserCompanyDetail::where('user_id', auth()->user()->id)->first();
        if ($other_detail) {
            $other_detail->update([
                'pan_number' => $this->pan_number,
                'pan_number_name' => $this->pan_number_name,
                'address_label' => $this->address_label,
                'company_address' => $this->company_address,
                'country' => $this->country,
                'state' => $this->state,
                'city' => $this->city,
                'company_pincode' => $this->company_pincode,
                'gstin_number' => $this->gstin_number,
            ]);
        } else {
            UserCompanyDetail::create([
                'user_id' => auth()->user()->id,
                'pan_number' => $this->pan_number,
                'pan_number_name' => $this->pan_number_name,
                'address_label' => $this->address_label,
                'company_address' => $this->company_address,
                'country' => $this->country,
                'state' => $this->state,
                'city' => $this->city,
                'company_pincode' => $this->company_pincode,
                'gstin_number' => $this->gstin_number,
            ]);
        }
        session()->flash('recruiterothermsg', 'Other details updated sucessfully');
        return redirect()->to('/user/profile');
    }


    public function render()
    {
        $other_detail = UserCompanyDetail::where('user_id', auth()->user()->id)->first();
        return view('livewire.recruiter.profile', [
            'other_detail' => $other_detail
        ]);
    }
}
