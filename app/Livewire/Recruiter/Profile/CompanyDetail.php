<?php

namespace App\Livewire\Recruiter\Profile;

use App\Models\CompanyType;
use App\Models\Industry;
use App\Models\User;
use App\Models\UserCompanyDetail;
use Livewire\Component;

class CompanyDetail extends Component
{
    public $company_type_id, $industry_type_id, $contact_person, $contact_person_designation, $website_url, $phone_number_1, $phone_number_2, $fax_number;


    public function mount()
    {
        $company_detail = UserCompanyDetail::with('companyType', 'industryType')->where('user_id', auth()->user()->id)->first();
        if ($company_detail) {
            $this->company_type_id = $company_detail->companyType->id;
            $this->industry_type_id = $company_detail->industryType->id;
            $this->contact_person =  $company_detail->contact_person;
            $this->contact_person_designation = $company_detail->contact_person_designation;
            $this->website_url =  $company_detail->website_url;
            $this->phone_number_1 =  $company_detail->phone_number_1;
            $this->phone_number_2 =  $company_detail->phone_number_2;
            $this->fax_number =  $company_detail->fax_number;
        }
    }

    public function updateCompany()
    {
        $company_detail = UserCompanyDetail::with('companyType', 'industryType')->where('user_id', auth()->user()->id)->first();
        if ($company_detail) {
            $company_detail->update([
                'company_type_id' => $this->company_type_id,
                'industry_type_id' => $this->industry_type_id,
                'contact_person' => $this->contact_person,
                'contact_person_designation' => $this->contact_person_designation,
                'website_url' => $this->website_url,
                'phone_number_1' => $this->phone_number_1,
                'phone_number_2' => $this->phone_number_2,
                'fax_number' => $this->fax_number,
            ]);
        } else {
            UserCompanyDetail::create([
                'user_id' => auth()->user()->id,
                'company_type_id' => $this->company_type_id,
                'industry_type_id' => $this->industry_type_id,
                'contact_person' => $this->contact_person,
                'contact_person_designation' => $this->contact_person_designation,
                'website_url' => $this->website_url,
                'phone_number_1' => $this->phone_number_1,
                'phone_number_2' => $this->phone_number_2,
                'fax_number' => $this->fax_number,
            ]);
        }
        session()->flash('recruitercompanymsg', 'Company details updated sucessfully');
        return redirect()->to('/user/profile');
    }

    public function render()
    {
        $company_detail = UserCompanyDetail::with('companyType', 'industryType')->where('user_id', auth()->user()->id)->first();
        return view('livewire.recruiter.profile.company-detail', [
            'company_detail' => $company_detail,
            'company_type_details' => CompanyType::where('status', 1)->get(),
            'industry_details' => Industry::where('status', 1)->get(),
        ]);
    }
}
