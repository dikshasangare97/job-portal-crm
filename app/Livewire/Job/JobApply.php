<?php

namespace App\Livewire\Job;

use App\Models\ApplicationStatusLog;
use App\Models\JobApply as ModelsJobApply;
use App\Models\PostJob;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class JobApply extends Component
{
    public $jobId, $application_status = ['1', '2', '8'];

    public function save($jobId)
    {
        $jobApplyData = ModelsJobApply::where('user_id', Auth::user()->id)->where('job_id', $jobId)->first();
        if ($jobApplyData) {
            session()->flash('error', 'Already apply for this job.');
        } else {
            $jobdata = PostJob::find($jobId);
            $modelsJobApply =   ModelsJobApply::create([
                'user_id' => Auth::user()->id,
                'job_id' => $jobId,
                'application_status' => 2,
                'recruiter_id' => $jobdata->user_id
            ]);
            foreach ($this->application_status as $appStatus) {
                ApplicationStatusLog::create([
                    'user_id' => Auth::user()->id,
                    'job_apply_id' => $modelsJobApply->id,
                    'status' => $appStatus,
                ]);
            }
            session()->flash('message', 'Sucessfully apply for a job.');
        }
        return redirect()->to('/job/' . $jobId . '/view');
    }

    public function render()
    {
        $jobApplies = [];
        if (auth()->check()) {
            $jobApplies = ModelsJobApply::where('user_id', auth()->user()->id)->get();
        }
        return view('livewire.job.job-apply',[
            'job_applies' => $jobApplies
        ]);
    }
}
