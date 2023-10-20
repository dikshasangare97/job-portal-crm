<?php

namespace App\Livewire\Admin\CompanyType;

use App\Models\CompanyType;
use Livewire\Component;
use Livewire\WithPagination;

class CompanyTypeIndex extends Component
{
    use WithPagination;

    public  $search_input = '';
    public  $isOpen = 0;
    public  $company_type_name = '';
    public  $companyTypeId, $status;

    public function openModal()
    {
        $this->isOpen = true;
        $this->resetValidation();
    }
    public function closeModal()
    {
        $this->isOpen = false;
    }
    public function search()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.company-type.company-type-index', [
            'company_types' => CompanyType::where('company_type_name', 'like', '%' . $this->search_input . '%')->orderBy('id', 'desc')->paginate(10)
        ]);
    }


    public function edit($id)
    {
        $education = CompanyType::findOrFail($id);
        $this->companyTypeId = $id;
        $this->company_type_name = $education->company_type_name;
        $this->status = $education->status;
        $this->openModal();
    }

    public function update()
    {
        if ($this->companyTypeId) {
            $post = CompanyType::findOrFail($this->companyTypeId);
            $post->update([
                'company_type_name' => $this->company_type_name,
                'status' => $this->status,
            ]);
            session()->flash('message', 'Company type detail updated sucessfully');
            return redirect()->to('/admin/company-type');
        }
    }
    public function delete($id)
    {
        CompanyType::find($id)->delete();
        session()->flash('message', 'Company type detail deleted sucessfully');
        return redirect()->to('/admin/company-type');
    }
}
