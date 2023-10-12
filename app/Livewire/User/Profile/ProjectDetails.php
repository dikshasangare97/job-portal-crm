<?php

namespace App\Livewire\User\Profile;

use App\Models\KeySkill;
use App\Models\Location;
use App\Models\UserEducationDetail;
use App\Models\UserEmploymentDetail;
use App\Models\UserProjectDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class ProjectDetails extends Component
{
    public $project_status = 0;
    #[Rule('required')]
    public $project_title;
    public $project_employment_name;
    public $project_client_name;
    public $worked_from_year;
    public $worked_from_month;
    public $worked_till_year;
    public $worked_till_month;
    public $project_detail;
    public $project_location;
    public $project_site = 0;
    public $nature_of_employment = 0;
    public $team_size;
    public $role;
    public $role_descripion;
    public $skill_used;
    public $user_project_id;

    public function render()
    {
        $userProjectDetails = UserProjectDetail::with('user', 'location')->where('user_id', Auth::user()->id)->get();
        $userEmploymentDetails = UserEmploymentDetail::where('user_id', Auth::user()->id)->get();
        $userEducationDetails = UserEducationDetail::where('user_id', Auth::user()->id)->get();
        return view('livewire.user.profile.project-details', [
            'locations' => Location::where('status', 1)->get(),
            'project_details' => $userProjectDetails,
            'key_skills' => KeySkill::where('status', 1)->get(),
            'userEmploymentDetails' => $userEmploymentDetails,
            'userEducationDetails' => $userEducationDetails,
        ]);
    }

    public function showProject_status()
    {
        $this->project_status  != $this->project_status;
    }

    public function saveProjectDetail()
    {
        $this->validate();
        if ($this->project_location == '') {
            $project_location = null;
        } else {
            $project_location = $this->project_location;
        }

        if ($this->worked_till_year == '') {
            $worked_till_year = null;
        } else {
            $worked_till_year = $this->worked_till_year;
        }

        if ($this->worked_till_month == '') {
            $worked_till_month = null;
        } else {
            $worked_till_month = $this->worked_till_month;
        }

        if ($this->worked_from_year == '') {
            $worked_from_year = null;
        } else {
            $worked_from_year = $this->worked_from_year;
        }

        if ($this->worked_from_month == '') {
            $worked_from_month = null;
        } else {
            $worked_from_month = $this->worked_from_month;
        }

        if ($this->skill_used == '') {
            $skill_used = null;
        } else {
            $skill_used = json_encode($this->skill_used);
        }

        UserProjectDetail::create([
            'user_id' => Auth::user()->id,
            'project_title' => $this->project_title,
            'project_employment_name' => $this->project_employment_name,
            'project_client_name' => $this->project_client_name,
            'project_status' => $this->project_status,
            'worked_from_year' => $worked_from_year,
            'worked_from_month' => $worked_from_month,
            'worked_till_year' => $worked_till_year,
            'worked_till_month' => $worked_till_month,
            'project_detail' => $this->project_detail ?? null,
            'project_location' => $project_location,
            'project_site' => $this->project_site,
            'nature_of_employment' => $this->nature_of_employment,
            'team_size' => $this->team_size,
            'role' =>  $this->role,
            'role_descripion' => $this->role_descripion ?? null,
            'skill_used' => $skill_used,
        ]);
        session()->flash('projectmessage', 'Project details has been successfully saved.');
        return redirect()->to('/user/profile');
    }

    public function getProjectId($id)
    {
        $this->user_project_id = $id;
    }

    public function deleteProject()
    {
        UserProjectDetail::find($this->user_project_id)->delete();
        session()->flash('projectmessage', 'Project detail deleted sucessfully');
        return redirect()->to('/user/profile');
    }
}
