<?php

namespace App\Livewire\User\Profile;

use App\Models\UserLanguageDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LanguageDetails extends Component
{
    public $language_name = [], $proficiency = [], $read = [], $write = [], $speak = [], $inputs = [];
    public $i = 1, $user_language_id;

    public function __construct()
    {
        $this->language_name[] = '';
        $this->proficiency[] = '';
        $this->read[] = '';
        $this->write[] = '';
        $this->speak[] = '';
    }

    public function render()
    {
        $userLanguageDetail = UserLanguageDetail::with('user')->where('user_id', Auth::user()->id)->get();
        return view('livewire.user.profile.language-details', [
            'userLanguageDetails' => $userLanguageDetail,
        ]);
    }

    public function addLanguage($i)
    {
        $this->inputs[] = $this->i;
        $this->i++;
    }

    public function removeLanguage($i)
    {
        unset($this->inputs[$i]);
    }

    private function resetInputFields()
    {
        $this->language_name = [];
        $this->proficiency = [];
        $this->read = [];
        $this->write = [];
        $this->speak = [];
    }

    public function saveLanguageDetail()
    {
        $validatedDate = $this->validate(
            [
                'language_name.0' => 'required',
                'proficiency.0' => 'required',
                'language_name.*' => 'required',
                'proficiency.*' => 'required',
            ],
            [
                'language_name.0.required' => 'language field is required',
                'proficiency.0.required' => 'proficiency field is required',
                'language_name.*.required' => 'language field is required',
                'proficiency.*.required' => 'proficiency field is required',
            ]
        );
        foreach ($this->language_name as $key => $value) {
            UserLanguageDetail::create([
                'user_id' => Auth::user()->id,
                'language_name' => $this->language_name[$key],
                'proficiency' => $this->proficiency[$key],
                'read' => $this->read[$key],
                'write' => $this->write[$key],
                'speak' => $this->speak[$key],
            ]);
        }
        $this->inputs = [];
        $this->resetInputFields();
        session()->flash('languagemessage', 'Language has been successfully saved.');
        return redirect()->to('/user/profile');
    }

    public function getItLanguageId($id)
    {
        $this->user_language_id = $id;
    }

    public function deleteLanguage()
    {
        UserLanguageDetail::find($this->user_language_id)->delete();
        session()->flash('languagemessage', 'Language detail deleted sucessfully');
        return redirect()->to('/user/profile');
    }
}
