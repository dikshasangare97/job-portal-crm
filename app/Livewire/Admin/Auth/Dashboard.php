<?php

namespace App\Livewire\Admin\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        // if (Auth::user()) {
        return view('livewire.admin.auth.dashboard');
        // }
        // return redirect()->route('admin.login');
    }
}
