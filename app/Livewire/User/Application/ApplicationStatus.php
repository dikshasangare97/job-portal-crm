<?php

namespace App\Livewire\User\Application;

use App\Models\ApplicationStatus as ModelsApplicationStatus;
use App\Models\ApplicationStatusLog;
use App\Models\JobApply;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ApplicationStatus extends Component
{
    public function render()
    {
        return view('livewire.user.application.application-status', [
            'application_details' => JobApply::where('user_id', Auth::user()->id)->with('user', 'job', 'applicationStatus')->orderBy('id', 'DESC')->get(),
            'get_first_job_apply' => JobApply::where('user_id', Auth::user()->id)->with('user', 'job', 'applicationStatus')->latest()->first(),
            'application_status_details' => ModelsApplicationStatus::get(),
            'application_log_details' => ApplicationStatusLog::where('user_id', Auth::user()->id)->with('user', 'jobApply')->orderBy('status', 'ASC')->get(),
            'get_all_job_apply' => JobApply::get(),
            'get_update_job_apply' => JobApply::where('application_status', '>=', 3)->get(),
        ]);
    }
}
