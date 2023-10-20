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
    public $role_name;


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
            'roles' => Role::where('role_name', 'like', '%' . $this->search_input . '%')->orderBy('id','desc')->paginate(10)
        ]);
    }



    public function edit($id)
    {

        $role = Role::findOrFail($id);
        $this->roleCategoryId = $id;
        $this->role_name = $role->role_name;
        $this->openModal();
    }

    public function update()
    {
        if ($this->roleCategoryId) {
            $post = Role::findOrFail($this->roleCategoryId);
            $post->update([
                'role_name' => $this->role_name,

            ]);
            session()->flash('success', 'Role Category  updated successfully.');
            $this->closeModal();
            $this->reset('role_name', 'roleCatgeoryId');
        }
    }

    public function delete($id)
    {
        Role::find($id)->delete();
        session()->flash('message', 'Role category detail deleted sucessfully');
        return redirect()->to('/admin/role');
    }
}
