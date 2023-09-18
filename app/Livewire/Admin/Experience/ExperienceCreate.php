<?php

namespace App\Livewire\Admin\Experience;

use App\Models\Experience;
use Livewire\Attributes\Rule;
use Livewire\Component;

class ExperienceCreate extends Component
{

    #[Rule('required|min:3')]
    public  $experience = '';
 

    public function resetInputFields()
    {
        $this->experience = '';
    }

    public function store()
    {
        $this->validate();
        Experience::create([
            'experience' => $this->experience,
        ]);
        session()->flash('message', 'Experience is created sucessfully');
        $this->resetInputFields();
        return redirect('/admin/experience');
    }

    public function render()
    {
        return view('livewire.admin.experience.experience-create');
    }
}
