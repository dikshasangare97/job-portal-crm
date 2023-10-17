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

    public $jobAppId;

    public function mount($id)
    {
        $this->jobAppId = $id;
    }

    public function render()
    {
        $jobApplications = JobApply::with('user', 'job', 'applicationStatus')->where([['recruiter_id', Auth::user()->id], ['job_id', $this->jobAppId]])->orderBy('id', 'DESC')->paginate(10);
        return view('livewire.recruiter.jobapplication.job-application', [
            'jobapplications' =>  $jobApplications,
        ]);
    }
}
