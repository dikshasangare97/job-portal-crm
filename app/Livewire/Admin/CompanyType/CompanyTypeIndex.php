<?php

namespace App\Livewire\Admin\CompanyType;

use App\Models\CompanyType;
use Livewire\Component;
use Livewire\WithPagination;

class CompanyTypeIndex extends Component
{
    use WithPagination;

    public $search_input = '';

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
}
