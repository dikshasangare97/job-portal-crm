<?php

namespace App\Livewire\Admin\Skills;

use App\Models\KeySkill;
use Livewire\Component;
use Livewire\WithPagination;

class SkillsIndex extends Component
{


    use WithPagination;
    public $search_input = '';
    public $isOpen = 0;
    public $skillId;
    public  $key_skill_name;
    public $skills;

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
        $skills = KeySkill::where('key_skill_name', 'like', '%' . $this->search_input . '%')->paginate(5);
        return view('livewire.admin.skills.skills-index', [
            'skills' => $skills
        ]);
    }
}
