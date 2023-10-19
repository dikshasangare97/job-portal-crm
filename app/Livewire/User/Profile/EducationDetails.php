<?php

namespace App\Livewire\User\Profile;

use App\Models\UserEducationDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class EducationDetails extends Component
{

    public $detail;
    #[Rule('required')]
    public $education_name = '', $university_name = '', $course_name = '', $specialization_name = '', $course_type = 'Full time', $course_duration_to = '', $course_duration_from = '', $marks = '';
    public $grading_system = '';
    public $user_education_id;

    public function render()
    {
        $userEducationDetail = UserEducationDetail::with('user')->where('user_id', Auth::user()->id)->get();
        return view('livewire.user.profile.education-details', [
            'userEducationDetails' => $userEducationDetail,
        ]);
    }

    public function saveEducationDetail()
    {
        $this->validate();
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

    public function getEducationId($id)
    {
        $this->user_education_id = $id;
        $this->detail = UserEducationDetail::find($this->user_education_id);
        $this->education_name = $this->detail->education_name;
        $this->university_name = $this->detail->university_name;
        $this->course_name = $this->detail->course_name;
        $this->specialization_name = $this->detail->specialization_name;
        $this->course_type = $this->detail->course_type;
        $this->course_duration_to = $this->detail->course_duration_to;
        $this->course_duration_from = $this->detail->course_duration_from;
        $this->grading_system = $this->detail->grading_system;
        $this->marks = $this->detail->marks;
    }

    public function deleteEducation()
    {
        UserEducationDetail::find($this->user_education_id)->delete();
        session()->flash('educationmessage', 'Education detail deleted sucessfully');
        return redirect()->to('/user/profile');
    }
}
