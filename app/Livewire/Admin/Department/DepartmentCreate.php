<?php

namespace App\Livewire\Admin\Department;

use App\Models\Departments;
use Livewire\Attributes\Rule;
use Livewire\Component;

class DepartmentCreate extends Component
{
    #[Rule('required|min:3')]
    public  $department_name = '';

    public function resetInputFields()
    {
        $this->department_name = '';
    }
    
    public function store()
    {
        $this->validate();
        Departments::create([
            'department_name' => $this->department_name,
        ]);
        session()->flash('message', 'Department is created sucessfully');
        $this->resetInputFields();
        return redirect('/admin/department');
    }

    public function render()
    {
        return view('livewire.admin.department.department-create');
    }
}
