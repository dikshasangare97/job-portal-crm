<?php

namespace App\Livewire\User\Profile;

use App\Models\KeySkill;
use App\Models\UserItSkillDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class ItskillDetails extends Component
{
    #[Rule('required')]
    public $software_name = '';
    public $software_version = '', $last_used = '', $experience_year = '', $experience_month = '';
    public $user_it_skill_id, $detail;

    public function render()
    {
        $userItSkill = UserItSkillDetail::with('user', 'keySkill')->where('user_id', Auth::user()->id)->get();
        return view('livewire.user.profile.itskill-details', [
            'userItSkills' => $userItSkill,
            'key_skills' => KeySkill::where('status', 1)->get()
        ]);
    }

    public function saveItSkill()
    {
        $this->validate();
        if ($this->software_version == '') {
            $software_version = null;
        } else {
            $software_version = $this->software_version;
        }

        if ($this->last_used == '') {
            $last_used = null;
        } else {
            $last_used = $this->last_used;
        }

        if ($this->experience_year == '') {
            $experience_year = null;
        } else {
            $experience_year = $this->experience_year;
        }

        if ($this->experience_month == '') {
            $experience_month = null;
        } else {
            $experience_month = $this->experience_month;
        }
        UserItSkillDetail::create([
            'user_id' => Auth::user()->id,
            'key_skill_id' => $this->software_name,
            'software_version' => $software_version,
            'last_used' => $last_used,
            'experience_year' => $experience_year,
            'experience_month' => $experience_month
        ]);
        session()->flash('itskillmessage', 'IT skill has been successfully saved.');
        return redirect()->to('/user/profile');
    }

    public function getItSkillId($id)
    {
        $this->user_it_skill_id = $id;
        $this->detail = UserItSkillDetail::find($this->user_it_skill_id);
        $this->software_name = $this->detail->keySkill->id;
        $this->software_version = $this->detail->software_version;
        $this->last_used = $this->detail->last_used;
        $this->experience_year = $this->detail->experience_year;
        $this->experience_month = $this->detail->experience_month;
    }

    public function deleteITSkill()
    {
        UserItSkillDetail::find($this->user_it_skill_id)->delete();
        session()->flash('itskillmessage', 'It skill detail deleted sucessfully');
        return redirect()->to('/user/profile');
    }

    public function updateItSkill()
    {
        $user_it_skill_detail = UserItSkillDetail::with('user', 'keySkill')->find($this->user_it_skill_id);
        $user_it_skill_detail->software_name = $this->software_name;
        $user_it_skill_detail->software_version = $this->software_version;
        $user_it_skill_detail->last_used = $this->last_used;
        $user_it_skill_detail->experience_year = $this->experience_year;
        $user_it_skill_detail->experience_month = $this->experience_month;

        $user_it_skill_detail->save();

        session()->flash('itskillmessage', 'it Skill updated sucessfully');
        return redirect()->to('/user/profile');
    }
}
