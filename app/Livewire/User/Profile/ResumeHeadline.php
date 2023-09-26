<?php

namespace App\Livewire\User\Profile;

use App\Models\UserPersonalDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class ResumeHeadline extends Component
{
    #[Rule('required|min:3')]
    public $resume_headline;

    public function render()
    {
        $userPersonalDetail = UserPersonalDetail::where('user_id', Auth::user()->id)->first();
        return view('livewire.user.profile.resume-headline', [
            'userPersonalDetail' => $userPersonalDetail
        ]);
    }

    public function saveHeadline()
    {
        $this->validate();
        $userPersonalDetail = UserPersonalDetail::where('user_id', Auth::user()->id)->first();

        if ($userPersonalDetail) {
            $userPersonalDetail->update([
                'resume_headline' => $this->resume_headline,
            ]);
        } else {
            UserPersonalDetail::create([
                'user_id' => Auth::user()->id,
                'resume_headline' => $this->resume_headline,
            ]);
        }
        session()->flash('headlinemessage', 'Resume headline has been successfully saved.');
        return redirect()->to('/user/profile');
    }
}
