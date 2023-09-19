<?php

namespace App\Livewire\Admin\RoleCategory;

use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class RoleCategoryIndex extends Component
{
    use WithPagination;

    public $search_input = '';

    public function search()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.role-category.role-category-index', [
            'roles' => Role::where('role_name', 'like', '%' . $this->search_input . '%')->paginate(5)
        ]);
    }

    public function delete($id)
    {
        Role::find($id)->delete();
        session()->flash('success', 'role deleted successfully.');
        $this->reset('city_name');
    }
}
