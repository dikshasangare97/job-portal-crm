<?php

namespace App\Livewire\Admin\JobRole;

use App\Models\JobRole;
use Livewire\Component;
use Livewire\WithPagination;

class JobRoleIndex extends Component
{
    use WithPagination;
    public  $search_input = '';
    public  $isOpen = 0;
    public $job_role_name;
    public $jobroleId;
    public $status;
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
        return view('livewire.admin.job-role.job-role-index', [
            'jobroles' => JobRole::with('roleCategory')->where('job_role_name', 'like', '%' . $this->search_input . '%')->orderBy('id','desc')->paginate(10)
        ]);
    }

    public function edit($id)
    {
        $jobrole = JobRole::findOrFail($id);
        $this->jobroleId = $id;
        $this->job_role_name = $jobrole->job_role_name;
        $this->status =  $jobrole->status;
        $this->openModal();
    }

    public function update()
    {

        if ($this->jobroleId) {
            $post = JobRole::findOrFail($this->jobroleId);
            $post->update([
                'job_role_name' => $this->job_role_name,
                'status' => $this->status,

            ]);
            session()->flash('success', 'Job role updated successfully.');
            $this->closeModal();
            $this->reset('job_role_name', 'status', 'jobroleId');
        }
    }

    public function delete($id)
    {
        JobRole::find($id)->delete();
        session()->flash('message', 'Job role detail deleted sucessfully');
        return redirect()->to('/admin/jobrole');
    }
}
