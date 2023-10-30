<?php

namespace App\Livewire\User\Profile;

use App\Models\KeySkill;
use App\Models\UserKeySkill;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class KeySkills extends Component
{
    #[Rule('required')]
    public $key_skill = [];
    public $detail;
    public $user_key_skill_id;

    public function render()
    {
        $userKeySkill = UserKeySkill::where('user_id', Auth::user()->id)->get();
        return view('livewire.user.profile.key-skills', [
            'userKeySkills' => $userKeySkill,
            'key_skills' => KeySkill::where('status', 1)->get()
        ]);
    }

    public function saveKeySkillDetail()
    {
        $this->validate();
        foreach ($this->key_skill as $value) {
            UserKeySkill::create([
                'user_id' => Auth::user()->id,
                'key_skill_id' => $value,
            ]);
        }
        session()->flash('keyskillmsg', 'Key skill has been successfully saved.');
        return redirect()->to('/user/profile');
        $this->key_skill = [];
    }

    public function deleteKeySkillId($id)
    {
        $this->user_key_skill_id = $id;
    }

    public function deleteKeySkill()
    {
        UserKeySkill::find($this->user_key_skill_id)->delete();
        session()->flash('keyskillmsg', 'Key skill deleted sucessfully');
        return redirect()->to('/user/profile');
    }
}
