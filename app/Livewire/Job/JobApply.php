<?php

namespace App\Livewire\Job;

use App\Models\JobApply as ModelsJobApply;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class JobApply extends Component
{
    public $jobId;

    public function save()
    {
        $jobApplyData = ModelsJobApply::where('user_id', Auth::user()->id)->where('job_id', $this->jobId)->first();
        if ($jobApplyData) {
            session()->flash('error', 'Already apply for this job.');
        } else {
            ModelsJobApply::create([
                'user_id' => Auth::user()->id,
                'job_id' => $this->jobId,
                'application_status' => 1
            ]);
            session()->flash('message', 'Sucessfully apply for a job.');
        }
        return redirect()->to('/job/' . $this->jobId . '/view');
    }

    public function render()
    {
        return view('livewire.job.job-apply');
    }
}
