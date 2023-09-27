<?php

namespace App\Livewire\User\Profile;

use App\Models\KeySkill;
use App\Models\UserKeySkill;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class KeySkills extends Component
{
    public $key_skill = [], $detail;

    // public function mount()
    // {
    //     $this->detail = UserKeySkill::where('user_id', Auth::user()->id)->get();
    //     $this->key_skill = $this->detail->key_skill;
    // }


    public function render()
    {
        $userKeySkill = UserKeySkill::where('user_id', Auth::user()->id)->get();
        return view('livewire.user.profile.key-skills', [
            'userKeySkills' => $userKeySkill,
            'key_skills' => KeySkill::where('status', 1)->get()
        ]);
    }

    public function saveSkill()
    {
        $userKeySkills = UserKeySkill::where('user_id', Auth::user()->id)->get();
        if ($userKeySkills->isNotEmpty()) {
            $userKeySkills->each->delete();
        }
        foreach ($this->key_skill as $value) {
            UserKeySkill::create([
                'user_id' => Auth::user()->id,
                'key_skill_id' => $value,
            ]);
        }
        $this->key_skill = [];
        session()->flash('keyskillmsg', 'Key skill has been successfully saved.');
        return redirect()->to('/user/profile');
    }
}
