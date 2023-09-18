<?php

namespace App\Livewire\Admin\Department;

use App\Models\Departments;
use Livewire\Component;
use Livewire\WithPagination;

class DepartmentIndex extends Component
{
    use WithPagination;

    public $search_input = '';
    
    public function search()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.department.department-index',
        [
            'departments' => Departments::where('department_name', 'like', '%' . $this->search_input . '%')->paginate(5)
    ]);
    }
    
}
