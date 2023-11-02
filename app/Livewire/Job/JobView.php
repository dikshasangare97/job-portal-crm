<?php

namespace App\Livewire\Job;

use App\Models\JobApply;
use App\Models\JobKeyskill;
use App\Models\PostJob;
use App\Models\UserKeySkill;
use App\Models\UserPersonalDetail;
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
        $job_keyskill_detail = [];
        $userPersonalDetail = [];
        if (auth()->check()) {
            $userKeySkills = UserKeySkill::where('user_id', auth()->user()->id)->get();
            $userPersonalDetail = UserPersonalDetail::where('user_id', Auth::user()->id)->first();
        }
        $job_keyskill_detail = JobKeyskill::with('keyskill')->where('job_id',  $this->detail->id)->get();

        return view('livewire.job.job-view', [
            'job' =>  $this->detail,
            'job_apply' => JobApply::where('job_id' , $this->detail->id)->first(),
            'user_keyskills' => $userKeySkills,
            'job_keyskills' => $job_keyskill_detail,
            'userPersonalDetail' => $userPersonalDetail
        ]);
    }
}
