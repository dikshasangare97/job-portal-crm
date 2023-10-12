<?php

namespace App\Livewire\User\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserProfileImage extends Component
{
    use WithFileUploads;
    public $profileimage;
    public $profile;

    public function mount()
    {
        $user =  User::find(Auth::user()->id);
        $this->profile = $user->profile_img;
    }

    public function updatedProfileimage()
    {
        $this->validate([
            'profileimage' => 'nullable|mimes:png,jpeg,jpg|max:2048',
        ]);
        $user =  User::find(Auth::user()->id);
        if ($this->profileimage) {
            $profileimageName = $this->profileimage->getClientOriginalName();
            $this->profileimage->storeAs('public/profileimage', $profileimageName);

            $user->update([
                'profile_img' => $profileimageName,
            ]);
            $this->profile = $user->profile_img;

            session()->flash('basicdetailmessage', 'Profile image has been successfully uploaded.');
            return redirect()->to('/user/profile');
        }
        return null;
    }

    public function render()
    {
        return view('livewire.user.profile.user-profile-image');
    }
}
