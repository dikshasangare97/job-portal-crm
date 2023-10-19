<?php

namespace App\Livewire\Admin\Skills;

use App\Models\KeySkill;
use Livewire\Attributes\Rule;
use Livewire\Component;

class SkillsCreate extends Component
{

    #[Rule('required|min:3')]
    public  $key_skill_name = '';

    public function resetInputFields()
    {
        $this->key_skill_name = '';
    }
    
    public function store()
    {
        $this->validate();
        KeySkill::create([
            'key_skill_name' => $this->key_skill_name,
        ]);
        session()->flash('message', 'Skill is created sucessfully');
        $this->resetInputFields();
        return redirect('/admin/skills');
    }


    public function render()
    {
        return view('livewire.admin.skills.skills-create');
    }
}
