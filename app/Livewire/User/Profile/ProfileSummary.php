<?php

namespace App\Livewire\User\Profile;

use App\Models\UserPersonalDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class ProfileSummary extends Component
{
    #[Rule('required|min:3')]
    public $profile_summary, $detail;

    public function mount()
    {
        $this->detail = UserPersonalDetail::where('user_id', Auth::user()->id)->first();
        $this->profile_summary = $this->detail->profile_summary;
    }

    public function render()
    {
        $userPersonalDetail = UserPersonalDetail::where('user_id', Auth::user()->id)->first();
        return view('livewire.user.profile.profile-summary', [
            'userPersonalDetail' => $userPersonalDetail
        ]);
    }

    public function saveSummary()
    {
        $this->validate();
        $userPersonalDetail = UserPersonalDetail::where('user_id', Auth::user()->id)->first();

        if ($userPersonalDetail) {
            $userPersonalDetail->update([
                'profile_summary' => $this->profile_summary,
            ]);
        } else {
            UserPersonalDetail::create([
                'user_id' => Auth::user()->id,
                'profile_summary' => $this->profile_summary,
            ]);
        }
        session()->flash('profilesummarymsg', 'Profile summary has been successfully saved.');
        return redirect()->to('/user/profile');
    }

    public function deleteSummary($id)
    {
        $userPersonalDetail = UserPersonalDetail::find($id);
        if ($userPersonalDetail->profile_summary) {
            $userPersonalDetail->update([
                'profile_summary' => null,
            ]);
        }
        session()->flash('profilesummarymsg', 'Profile summary has been successfully deleted.');
        return redirect()->to('/user/profile');
    }
}
