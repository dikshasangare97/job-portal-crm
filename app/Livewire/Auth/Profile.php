<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class Profile extends Component
{
    public function mount()
    {
        $user = Auth::user();
        if (!$user) {
            return Redirect::to('/login');
        }
    }

    public function render()
    {
        return view('livewire.auth.profile');
    }
}
