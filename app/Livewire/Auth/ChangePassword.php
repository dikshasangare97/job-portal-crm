<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePassword extends Component
{
    public $new_password = '', $old_password = '', $confirm_password = '';

    public function changePassword()
    {
        $user = User::find(Auth::user()->id);
        $this->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|min:8|same:new_password',
        ]);

        if (Auth::attempt(['email' => $user->email, 'password' => $this->old_password])) {
            $newpassword = Hash::make($this->new_password);
            $user->update([
                'password' => $newpassword,
            ]);
            session()->flash('message', 'Password changed successfully.');
        } else {
            session()->flash('error', 'Current password is incorrect.');
        }
        return redirect()->to('/change-password');
    }


    public function render()
    {
        return view('livewire.auth.change-password');
    }
}
