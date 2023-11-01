<?php

namespace App\Livewire\Job;

use App\Models\JobApply;
use App\Models\PostJob;
use App\Models\UserKeySkill;
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
        $userKeySkills = [];
        if (auth()->check()) {
            $userKeySkills = UserKeySkill::where('user_id', auth()->user()->id)->get();
        }

        return view('livewire.job.job-view', [
            'job' =>  $this->detail,
            'job_apply' => JobApply::where('job_id' , $this->detail->id)->first(),
            'user_keyskills' => $userKeySkills,
        ]);
    }
}
