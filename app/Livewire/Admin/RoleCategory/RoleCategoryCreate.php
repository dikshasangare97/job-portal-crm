<?php

namespace App\Livewire\Admin\RoleCategory;

use App\Models\Role;
use Livewire\Attributes\Rule;
use Livewire\Component;

class RoleCategoryCreate extends Component
{

    #[Rule('required|min:3')]
    public  $role_name = '';

    #[Rule('required|min:3')]
    public  $description = '';

    public function resetInputFields()
    {
        $this->role_name = '';
        $this->description = '';
    }

    public function store()
    {
        $this->validate();
        Role::create([
            'role_name' => $this->role_name,
            'description' => $this->description,
            'status' => 1
        ]);
        session()->flash('message', 'Role category is created sucessfully');
        $this->resetInputFields();
        return redirect('/admin/role');
    }


    public function render()
    {
        return view('livewire.admin.role-category.role-category-create');
    }
}
