<?php

namespace App\Livewire\Job;

use App\Models\JobApply;
use App\Models\JobKeyskill;
use App\Models\PostJob;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class JobIndex extends Component
{
    use WithPagination;

    public function  render()
    {
        if (Auth::user()) {
            $jobApplies = JobApply::where('user_id', Auth::user()->id)->get();
        } else {
            $jobApplies = JobApply::get();
        }
        return view('livewire.job.job-index', [
            'jobs' =>  PostJob::with('location', 'industry', 'role', 'education', 'companyType')
                ->orderBy('id', 'DESC')->paginate(15),
            'job_applies' => $jobApplies,
            'job_key_skills' => JobKeyskill::get(),
        ]);
    }
}
