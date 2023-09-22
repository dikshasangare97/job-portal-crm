<?php

namespace App\Livewire\Recruiter\Jobapplication;

use App\Models\JobApply;
use Livewire\Component;

class JobApplicationView extends Component
{
    public $applicationData;

    public function mount($id)
    {
        $this->applicationData = JobApply::with('user', 'job')->find($id);
    }

    public function render()
    {
        return view('livewire.recruiter.jobapplication.job-application-view', [
            'applicationData' => $this->applicationData
        ]);
    }
}
