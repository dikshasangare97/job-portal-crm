<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Login extends Component
{
    #[Rule('required|email')]
    public $email;

    #[Rule('required|min:6')]
    public $password;

    public function store()
    {
        $this->validate();
        $user = User::where('email', $this->email)->first();

        if ($user && ($user->is_user == 1) && Hash::check($this->password, $user->password)) {
            auth()->login($user);
            session()->flash('message', "You are Login successfully.");
            return redirect()->to('/user/profile');
        } else {
            session()->flash('error', 'Something went wrong. Please check entered email and password.');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
