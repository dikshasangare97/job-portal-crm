<?php

namespace App\Livewire\Component\Layouts;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminLayout extends Component
{
    public function logout()
    {
        Auth::logout();
        session()->flash('message', 'You are logout sucessfully.');
        return redirect()->to('/admin/login');
    }

    public function render()
    {
        return view('livewire.component.layouts.admin-layout');
    }
}
