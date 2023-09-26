<?php

namespace App\Livewire\User\Profile;

use App\Models\UserPersonalDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class ResumeUpload extends Component
{
    use WithFileUploads;

    public $resume;
    public function render()
    {
        $userPersonalDetail = UserPersonalDetail::where('user_id', Auth::user()->id)->first();
        return view('livewire.user.profile.resume-upload', [
            'userPersonalDetail' => $userPersonalDetail
        ]);
    }

    public function updatedResume()
    {
        $this->validate([
            'resume' => 'nullable|mimes:doc,docx,rtf,pdf|max:2048',
        ]);

        $userPersonalDetail = UserPersonalDetail::where('user_id', Auth::user()->id)->first();
        if ($this->resume) {
            $resumeName = $this->resume->getClientOriginalName();
            $this->resume->storeAs('public/resume', $resumeName);
        } else {
            $resumeName = null;
        }

        if ($userPersonalDetail) {
            $userPersonalDetail->update([
                'resume' => $resumeName,
            ]);
            session()->flash('resumemessage', 'Resume has been successfully updated.');
        } else {
            UserPersonalDetail::create([
                'user_id' => Auth::user()->id,
                'resume' => $resumeName,
            ]);
            session()->flash('resumemessage', 'Resume has been successfully uploaded.');
        }
        return redirect()->to('/user/profile');
    }

    public function deleteResume($id)
    {
        $userPersonalDetail = UserPersonalDetail::find($id);
        $userPersonalDetail->update([
            'resume' => null,
        ]);
        session()->flash('message', 'Resume deleted sucessfully');
        return redirect()->to('/user/profile');
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
