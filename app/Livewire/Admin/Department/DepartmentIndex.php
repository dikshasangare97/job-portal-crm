<?php

namespace App\Livewire\Admin\Department;

use App\Models\Departments;
use Livewire\Component;
use Livewire\WithPagination;

class DepartmentIndex extends Component
{
    use WithPagination;

    public $search_input = '';
    public $isOpen = 0;
    public $department_name;
    public $departmentId, $status;

    public function search()
    {
        $this->resetPage();
    }

    public function openModal()
    {
        $this->isOpen = true;
        $this->resetValidation();
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.admin.department.department-index', [
            'departments' => Departments::where('department_name', 'like', '%' . $this->search_input . '%')->orderBy('id', 'desc')->paginate(10)
        ]);
    }

    public function edit($id)
    {
        $department = Departments::findOrFail($id);
        $this->departmentId = $id;
        $this->department_name = $department->department_name;
        $this->status = $department->status;
        $this->openModal();
    }

    public function update()
    {
        if ($this->departmentId) {
            $post = Departments::findOrFail($this->departmentId);
            $post->update([
                'department_name' => $this->department_name,
                'status' => $this->status,
            ]);
            session()->flash('message', 'Department detail updated sucessfully');
            return redirect()->to('/admin/department');
        }
    }

    public function delete($id)
    {
        Departments::find($id)->delete();
        session()->flash('message', 'Department detail deleted sucessfully');
        return redirect()->to('/admin/department');
    }
}
