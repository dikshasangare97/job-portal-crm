<?php

namespace App\Livewire\User;

use App\Models\UserPersonalDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $resume;

    public function render()
    {
        $userPersonalDetail = UserPersonalDetail::where('user_id', Auth::user()->id)->first();
        return view('livewire.user.profile', [
            'userPersonalDetail' =>  $userPersonalDetail
        ]);
    }

    public function updatedResume()
    {
        $this->validate([
            'resume' => 'nullable|mimes:doc,docx,rtf,pdf|max:2048',
        ]);

        if ($this->resume) {
            $resumeName = $this->resume->getClientOriginalName();
            $this->resume->storeAs('public/resume', $resumeName);
        } else {
            $resumeName = null;
        }
        UserPersonalDetail::create([
            'user_id' => Auth::user()->id,
            'resume' => $resumeName,
        ]);
        session()->flash('resumemessage', 'Resume has been successfully uploaded.');
        return redirect()->to('/user/profile');
    }
}
