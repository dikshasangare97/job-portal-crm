<?php

namespace App\Livewire\User\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserProfileImage extends Component
{
    use WithFileUploads;
    public $profile_image;



    public function updatedProfile_image()
    {
        dd(1);
        $this->validate([
            'profile_image' => 'nullable|mimes:png,jpeg,jpg|max:2048',
        ]);

        if ($this->profile_image) {
            $profile_imageName = $this->profile_image->getClientOriginalName();
            $this->profile_image->storeAs('public/profile_image', $profile_imageName);
        } else {
            $profile_imageName = null;
        }
        dd($profile_imageName);
        $user =  User::find(Auth::user()->id);
        dd($user);
        $user->update([
            'profile_img' => $profile_imageName,
        ]);
        session()->flash('basicdetailmessage', 'Profile image has been successfully uploaded.');
        return redirect()->to('/user/profile');
    }

    public function render()
    {
        return view('livewire.user.profile.user-profile-image');
    }
}
