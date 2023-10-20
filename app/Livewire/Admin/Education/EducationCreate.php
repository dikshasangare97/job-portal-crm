<?php

namespace App\Livewire\Admin\Education;

use App\Models\Education;
use Livewire\Attributes\Rule;
use Livewire\Component;

class EducationCreate extends Component
{
    #[Rule('required|min:3')]
    public  $education_name = '';

    public function resetInputFields()
    {
        $this->education_name = '';
    }

    public function store()
    {
        $this->validate();
        Education::create([
            'education_name' => $this->education_name,
            'status' => 1
        ]);
        session()->flash('message', 'Education is created sucessfully');
        $this->resetInputFields();
        return redirect('/admin/education');
    }

    public function render()
    {
        return view('livewire.admin.education.education-create');
    }
}
