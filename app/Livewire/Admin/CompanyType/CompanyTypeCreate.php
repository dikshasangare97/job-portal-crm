<?php

namespace App\Livewire\Admin\CompanyType;

use App\Models\CompanyType;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CompanyTypeCreate extends Component
{
    #[Rule('required|min:3')]
    public  $company_type_name = '';

    public function resetInputFields()
    {
        $this->company_type_name = '';
    }

    public function store()
    {
        $this->validate();
        CompanyType::create([
            'company_type_name' => $this->company_type_name,
            'status' => 1
        ]);
        session()->flash('message', 'Company type is created sucessfully');
        $this->resetInputFields();
        return redirect('/admin/company-type');
    }

    public function render()
    {
        return view('livewire.admin.company-type.company-type-create');
    }
}
