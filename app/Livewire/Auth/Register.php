<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Register extends Component
{
    #[Rule('required|string|max:255')]
    public $name = '';
    public $email = '';
    public $password = '';
    #[Rule('required|numeric|min:10|max:10')]
    public $contact_number = '';

    public function store()
    {
        $this->validate([
            'email' => 'required|string|email|email:rfc,dns|max:255',
            'password' => 'required|min:6'
        ]);
        $newpassword = Hash::make($this->password);
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $newpassword,
            'contact_number' => $this->contact_number,
            'is_user' => 1,
            'register_for' => 'user'
        ]);
        session()->flash('message', 'Your registration is successfully.');
        $this->reset('name', 'email', 'password', 'contact_number');
        return redirect()->to('/login');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
