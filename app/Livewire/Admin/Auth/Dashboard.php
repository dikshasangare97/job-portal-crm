<?php

namespace App\Livewire\Admin\Auth;

use App\Models\PostJob;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        // if (Auth::user()) {
        $get_total_user = User::where('is_user','!=',2)->get();
        $get_total_job = PostJob::get();
        return view('livewire.admin.auth.dashboard',[
            'get_total_user' => $get_total_user->count(),
            'get_total_job' => $get_total_job->count(),
        ]);
        // }
        // return redirect()->route('admin.login');
    }
}
