<?php

namespace App\Livewire;

use App\Models\PostJob;
use Livewire\Component;

class Homepage extends Component
{
    public function render()
    {
        return view('livewire.homepage', [
            'jobs' => PostJob::with('user', 'location', 'industry', 'role', 'education', 'companyType', 'postedBy', 'workMode', 'department', 'workExperience')->orderBy('id', 'DESC')->take(9)->get()
        ]);
    }
}
