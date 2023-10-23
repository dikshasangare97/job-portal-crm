<?php

namespace App\Livewire;

use App\Models\JobApply;
use App\Models\PostJob;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Homepage extends Component
{
    public function render()
    {
        return view('livewire.homepage', [
            'jobs' => PostJob::with('user', 'location', 'industry', 'role', 'education', 'companyType', 'postedBy', 'workMode', 'department', 'workExperience')->orderBy('id', 'DESC')->take(9)->get(),
            'job_applies' => JobApply::where('user_id', Auth::user()->id)->get()
        ]);
    }
}
