<?php

namespace App\Livewire\Recruiter\Jobapplication;

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
    public $jobAppId;

    public function mount($id)
    {
        $this->jobAppId = $id;
    }

    public function render()
    {
        $user = User::find($this->jobAppId);
        $userKeySkills = UserKeySkill::with('keySkill')->where('user_id', $user->id)->take(10)->get();
        $userEducationDetails = UserEducationDetail::where('user_id', $user->id)->get();
        $userEmploymentDetails = UserEmploymentDetail::with('location', 'department', 'userSkill')->where('user_id', $user->id)->get();
        $userPersonalDetail = UserPersonalDetail::where('user_id', $user->id)->first();
        $userProjectDetails = UserProjectDetail::where('user_id', $user->id)->get();
        $getUserDesignation = UserEmploymentDetail::where('user_id', $user->id)->orWhere('current_employment', 1)->with('location')->first();

        return view('livewire.recruiter.jobapplication.job-application-view', [
            'user' => $user,
            'userKeySkills' => $userKeySkills,
            'userEducationDetails' => $userEducationDetails,
            'userEmploymentDetails' => $userEmploymentDetails,
            'userPersonalDetail' => $userPersonalDetail,
            'userProjectDetails' => $userProjectDetails,
            'getUserDesignation' => $getUserDesignation
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
        $userPersonalDetail = UserPersonalDetail::find($id);
        if ($userPersonalDetail && $userPersonalDetail->resume) {
            $file = $userPersonalDetail->resume;
            $filePath = storage_path("app/public/resume/$file");

            if (file_exists($filePath)) {
                return response()->download($filePath, $file);
            }
        }
    }
}
