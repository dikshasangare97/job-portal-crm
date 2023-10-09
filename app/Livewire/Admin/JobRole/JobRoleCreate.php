<?php

namespace App\Livewire\Admin\JobRole;

use App\Models\JobRole;
use Livewire\Attributes\Rule;
use Livewire\Component;

class JobRoleCreate extends Component
{

    #[Rule('required|min:3')]
    public  $job_role_name = '';

    public function resetInputFields()
    {
        $this->job_role_name = '';
    }

    public function render()
    {
        return view('livewire.admin.job-role.job-role-create');
    }

    public function store()
    {
        $this->validate();
        JobRole::create([
            'job_role_name' => $this->job_role_name,
        ]);
        session()->flash('message', 'Job Role is created sucessfully');
        $this->resetInputFields();
        return redirect('/admin/jobrole');
    }

    
}
