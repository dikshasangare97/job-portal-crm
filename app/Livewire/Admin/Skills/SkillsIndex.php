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
    public $key_skill_name, $status;

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
        return view('livewire.admin.skills.skills-index', [
            'key_skills' => KeySkill::where('key_skill_name', 'like', '%' . $this->search_input . '%')->orderBy('id', 'desc')->paginate(10)
        ]);
    }

    public function edit($id)
    {
        $workmode = KeySkill::findOrFail($id);
        $this->skillId = $id;
        $this->key_skill_name = $workmode->key_skill_name;
        $this->status = $workmode->status;
        $this->openModal();
    }

    public function update()
    {
        if ($this->skillId) {
            $post = KeySkill::findOrFail($this->skillId);
            $post->update([
                'key_skill_name' => $this->key_skill_name,
                'status' => $this->status,
            ]);
            session()->flash('message', 'Skill detail updated sucessfully');
            return redirect()->to('/admin/skills');
        }
    }

    public function delete($id)
    {
        KeySkill::find($id)->delete();
        session()->flash('message', 'Skill detail deleted sucessfully');
        return redirect()->to('/admin/skills');
    }
}
