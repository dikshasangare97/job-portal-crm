<?php

namespace App\Livewire\User\Profile;

use App\Models\UserEducationDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class EducationDetails extends Component
{

    public $detail;
    public $course_duration_to;
    public $course_type = 'Full Time';
    public $course_duration_from = '';
    public $grading_system = '';
    public $marks = '';
    public $education_name = '';
    public $university_name = '';
    public $course_name = '';
    public $specialization_name = '';

    public function mount()
    {
        $this->detail = UserEducationDetail::with('user')->where('user_id', Auth::user()->id)->first();
        // if (($this->detail->education_name)->isNotEmpty()) {
        //     $this->education_name = $this->detail->education_name;
        //     $this->university_name = $this->detail->university_name;
        //     $this->course_name = $this->detail->course_name;
        //     $this->specialization_name = $this->detail->specialization_name;
        //     $this->course_type = $this->detail->course_type;
        //     $this->course_duration_to = $this->detail->course_duration_to;
        //     $this->course_duration_from = $this->detail->course_duration_from;
        //     $this->grading_system = $this->detail->grading_system;
        //     $this->marks = $this->detail->marks;
        // }
    }


    public function render()
    {
        $userEducationDetail = UserEducationDetail::with('user')->where('user_id', Auth::user()->id)->get();
        return view('livewire.user.profile.education-details', [
            'userEducationDetails' => $userEducationDetail,
        ]);
    }

    public function saveCareerDetail()
    {
        UserEducationDetail::create([
            'user_id' => Auth::user()->id,
            'education_name' => $this->education_name,
            'university_name' => $this->university_name,
            'course_name' => $this->course_name,
            'specialization_name' => $this->specialization_name,
            'course_type' => $this->course_type,
            'course_duration_to' => $this->course_duration_to,
            'course_duration_from' => $this->course_duration_from,
            'grading_system' => $this->grading_system,
            'marks' => $this->marks,
        ]);
        session()->flash('educationmessage', 'Education detail has been successfully saved.');
        return redirect()->to('/user/profile');
    }
}
