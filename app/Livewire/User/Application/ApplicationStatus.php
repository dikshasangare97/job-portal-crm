<?php

namespace App\Livewire\User\Application;

use App\Models\ApplicationStatus as ModelsApplicationStatus;
use App\Models\ApplicationStatusLog;
use App\Models\JobApply;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ApplicationStatus extends Component
{
    public $jobId;

    public function setJobId($applicationLogDetailId)
    {
        dd($this->jobId);

        $this->jobId = $applicationLogDetailId;
    }

    public function render()
    {
        $application_log_details = ApplicationStatusLog::where('user_id', Auth::user()->id)->orWhere('job_id', $this->jobId)->with('user', 'job')->orderBy('status', 'ASC')->get();
        return view('livewire.user.application.application-status', [
            'application_details' => JobApply::where('user_id', Auth::user()->id)->with('user', 'job', 'applicationStatus')->get(),
            'application_status_details' => ModelsApplicationStatus::get(),
            'application_log_details' => $application_log_details,
        ]);
    }
}
