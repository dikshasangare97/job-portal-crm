<?php

namespace App\Livewire\Recruiter\Jobapplication;

use App\Models\ApplicationStatusLog;
use App\Models\JobApply;
use App\Models\KeySkill;
use App\Models\User;
use App\Models\UserEducationDetail;
use App\Models\UserEmploymentDetail;
use App\Models\UserKeySkill;
use App\Models\UserPersonalDetail;
use App\Models\UserProjectDetail;
use Livewire\Component;

class JobApplicationView extends Component
{
    public $jobAppUserId, $jobId;

    public function mount($jobId, $userId)
    {
        $this->jobId = $jobId;
        $this->jobAppUserId = $userId;
    }

    public function render()
    {
        $user = User::find($this->jobAppUserId);
        $userKeySkills = UserKeySkill::with('keySkill')->where('user_id', $user->id)->take(10)->get();
        $userEducationDetails = UserEducationDetail::where('user_id', $user->id)->get();
        $userEmploymentDetails = UserEmploymentDetail::with('location', 'department', 'userSkill')->where('user_id', $user->id)->get();
        $userPersonalDetail = UserPersonalDetail::where('user_id', $user->id)->first();
        $userProjectDetails = UserProjectDetail::where('user_id', $user->id)->get();
        $getUserDesignation = UserEmploymentDetail::where('user_id', $user->id)->orWhere('current_employment', 1)->with('location')->first();
        $jobApplyStatus = JobApply::with('applicationStatus')->where([['user_id', $this->jobAppUserId], ['job_id', $this->jobId]])->first();

        return view('livewire.recruiter.jobapplication.job-application-view', [
            'user' => $user,
            'userKeySkills' => $userKeySkills,
            'userEducationDetails' => $userEducationDetails,
            'userEmploymentDetails' => $userEmploymentDetails,
            'userPersonalDetail' => $userPersonalDetail,
            'userProjectDetails' => $userProjectDetails,
            'getUserDesignation' => $getUserDesignation,
            'jobApplyStatus' => $jobApplyStatus
        ]);
    }

    public function getSkillNames($skillUsed)
    {
        if ($skillUsed) {
            $skillIds = json_decode($skillUsed);
            $skillNames = [];
            foreach ($skillIds as $skillId) {
                if (count($skillNames) >= 5) {
                    break;
                }
                $keySkill = KeySkill::where('id', $skillId)->first();
                if ($keySkill) {
                    $skillNames[] = $keySkill->key_skill_name;
                }
            }
            return !empty($skillNames) ? implode(', ', $skillNames) : '-';
        }
    }

    public function downloadResume($id)
    {
        $userChangeStatus = JobApply::where([['user_id', $this->jobAppUserId], ['job_id', $this->jobId], ['application_status', '<', 4]])->first();
        if ($userChangeStatus) {
            $userChangeStatus->update([
                'application_status' => 4,
            ]);
            ApplicationStatusLog::create([
                'user_id' => $this->jobAppUserId,
                'job_apply_id' => $userChangeStatus->id,
                'status' => 4,
            ]);
        }
        $userPersonalDetail = UserPersonalDetail::find($id);
        if ($userPersonalDetail && $userPersonalDetail->resume) {
            $file = $userPersonalDetail->resume;
            $filePath = storage_path("app/public/resume/$file");

            if (file_exists($filePath)) {
                return response()->download($filePath, $file);
            }
        }
    }

    public function saveUserApplyStatus($status)
    {
        $userChangeStatus = JobApply::where([['user_id', $this->jobAppUserId], ['job_id', $this->jobId], ['application_status', '<', $status]])->first();
        if ($userChangeStatus) {
            $userChangeStatus->update([
                'application_status' => $status,
            ]);
            ApplicationStatusLog::create([
                'user_id' => $this->jobAppUserId,
                'job_apply_id' => $userChangeStatus->id,
                'status' => $status,
            ]);
        }
        session()->flash('jobApplyStatusMess', 'Job application status has been changed successfully.');
        return redirect()->back();
    }
}
