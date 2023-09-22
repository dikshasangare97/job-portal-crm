<?php

namespace App\Livewire\Recruiter\Jobapplication;

use App\Models\JobApply;
use App\Models\PostJob;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class JobApplication extends Component
{
    use WithPagination;

    public $jobApplications;

    public function mount($id)
    {
        $this->jobApplications = JobApply::with('user', 'job')->where('recruiter_id', Auth::user()->id)->where('job_id', $id)->orderBy('id', 'DESC')->get();
    }

    public function render()
    {
        return view('livewire.recruiter.jobapplication.job-application', [
            'jobapplications' =>  $this->jobApplications,
        ]);
    }
}
