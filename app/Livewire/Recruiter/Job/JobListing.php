<?php

namespace App\Livewire\Recruiter\Job;

use App\Models\PostJob;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class JobListing extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.recruiter.job.job-listing', [
            'jobs' =>  PostJob::with('location', 'industry', 'role', 'education', 'companyType')
                ->where('user_id', Auth::user()->id)
                ->orderBy('id', 'DESC')->paginate(15)
        ]);
    }
}
