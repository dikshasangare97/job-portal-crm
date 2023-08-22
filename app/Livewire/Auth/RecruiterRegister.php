<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;

class RecruiterRegister extends Component
{
    #[Rule('required')]
    public $register_for = 'company';
    #[Rule('required')]
    public $company_info_for = '';

    #[Rule('required|string|max:255')]
    public $name = '';
    public $email = '';
    public $password = '';
    #[Rule('required|numeric|min:10|max:10')]
    public $contact_number = '';
    public $company_name = '';
    public $designation = '';
    public $pin_code = '';
    public $street_address = '';

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
            'register_for' => $this->register_for,
            'company_info_for' => $this->company_info_for,
            'company_name' => $this->company_name,
            'designation' => $this->designation,
            'pin_code' => $this->pin_code,
            'street_address' => $this->street_address,
            'is_active' => 0,
            'is_user' => 0
        ]);
        session()->flash('message', 'Your registration is successfully.');
        $this->reset('name', 'email', 'password', 'contact_number', 'register_for', 'company_info_for', 'company_name', 'designation', 'pin_code', 'street_address');
        return redirect()->to('/recruiter-login');
    }

    public function render()
    {
        return view('livewire.auth.recruiter-register');
    }
}
