<?php

namespace App\Livewire;

use App\Models\JobApply;
use App\Models\PostJob;
use App\Models\UserPersonalDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Homepage extends Component
{
    public function render()
    {
        $userPersonalDetail = [];
        if (Auth::user()) {
            $jobApplies = JobApply::where('user_id', Auth::user()->id)->get();
            $userPersonalDetail = UserPersonalDetail::where('user_id', Auth::user()->id)->first();
        } else {
            $jobApplies = JobApply::get();
        }

        return view('livewire.homepage', [
            'jobs' => PostJob::with('user', 'location', 'industry', 'role', 'education', 'companyType', 'postedBy', 'workMode', 'department', 'workExperience')->where('status', 1)->orderBy('id', 'DESC')->take(9)->get(),
            'job_applies' =>  $jobApplies,
            'userPersonalDetail' =>  $userPersonalDetail,
        ]);
    }
}
