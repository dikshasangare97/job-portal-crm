<?php

namespace App\Livewire\Admin\RoleCategory;

use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class RoleCategoryIndex extends Component
{
    use WithPagination;
    public $isOpen = 0;
    public $roleCategoryId;
    public $search_input = '';
    public $role;
    public $role_name, $status, $description;


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
        return view('livewire.admin.role-category.role-category-index', [
            'roles' => Role::where('role_name', 'like', '%' . $this->search_input . '%')->orderBy('id', 'desc')->paginate(10)
        ]);
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $this->roleCategoryId = $id;
        $this->role_name = $role->role_name;
        $this->description = $role->description;
        $this->status = $role->status;
        $this->openModal();
    }

    public function update()
    {
        if ($this->roleCategoryId) {
            $post = Role::findOrFail($this->roleCategoryId);
            $post->update([
                'role_name' => $this->role_name,
                'description' => $this->description,
                'status' => $this->status,
            ]);
            session()->flash('message', 'Role category detail updated sucessfully');
            return redirect()->to('/admin/role');
        }
    }

    public function delete($id)
    {
        Role::find($id)->delete();
        session()->flash('message', 'Role category detail deleted sucessfully');
        return redirect()->to('/admin/role');
    }
}
