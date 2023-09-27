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
        public  $companyTypeId;

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
            'company_types' => CompanyType::where('company_type_name', 'like', '%' . $this->search_input . '%')->paginate(5)
        ]);
    }
    

    public function edit($id)
    {
        
        $education = CompanyType::findOrFail($id);   
        $this->companyTypeId = $id;
        $this-> company_type_name = $education->company_type_name;
        $this->openModal();
    }
   
    public function update()
    {
        if ($this->companyTypeId) {
            $post = CompanyType::findOrFail($this->companyTypeId);
            $post->update([
                'company_type_name' => $this->company_type_name,
                
            ]);
            session()->flash('success', 'Company Type updated successfully.');
            $this->closeModal();
            $this->reset('company_type_name', 'companyTypeId');
        }  
    }
        public function delete($id)
        {
            CompanyType::find($id)->delete();
            session()->flash('success', 'Company type deleted successfully.');
            $this->reset('company_type_name');
        }


}
