<?php

namespace App\Livewire\Recruiter\Jobapplication;

use App\Models\ApplicationStatusLog;
use App\Models\JobApply;
use App\Models\JobKeyskill;
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
        $jobApplications = JobApply::with('user', 'job', 'applicationStatus','user.userKeySkill','user.userPersonalDetail')->where([['recruiter_id', Auth::user()->id], ['job_id', $this->jobAppId]])->orderBy('id', 'DESC')->paginate(10);
        $jobkeyskills = JobKeyskill::where('job_id', $this->jobAppId)->get();
        return view('livewire.recruiter.jobapplication.job-application', [
            'jobapplications' =>  $jobApplications,
            'jobkeyskills' =>  $jobkeyskills,
        ]);
    }

    public function viewButtonClicked($userId)
    {
        $userClickStatus = JobApply::with('user', 'job', 'applicationStatus')->where([['user_id', $userId], ['job_id', $this->jobAppId], ['application_status', '<', 3]])->first();
        if ($userClickStatus) {
            $userClickStatus->update([
                'application_status' => 3,
            ]);
            ApplicationStatusLog::create([
                'user_id' => $userId,
                'job_apply_id' => $userClickStatus->id,
                'status' => 3,
            ]);
        }
        return redirect("/recruiter/job/{$this->jobAppId}/applications/view/{$userId}");
    }
}
