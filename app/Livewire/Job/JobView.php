<?php

namespace App\Livewire\Job;

use App\Models\JobApply;
use App\Models\PostJob;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class JobView extends Component
{
    public $detail;
    public function mount($id)
    {
        $this->detail = PostJob::find($id);
    }

    public function render()
    {
        return view('livewire.job.job-view', [
            'job' =>  $this->detail,
            'job_apply' => JobApply::where('job_id' , $this->detail->id)->first()
        ]);
    }
}
