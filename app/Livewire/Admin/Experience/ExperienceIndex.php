<?php

namespace App\Livewire\Admin\Experience;

use App\Models\Experience;
use Livewire\Component;
use Livewire\WithPagination;

class ExperienceIndex extends Component
{
    use WithPagination;

    public $search_input = '';
    public $isOpen = 0;
    public $experience;
    public $experienceId, $status;


    public function search()
    {
        $this->resetPage();
    }

    public function openModal()
    {
        $this->isOpen = true;
        $this->resetValidation();
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.admin.experience.experience-index', [
            'experiences' => Experience::where('experience', 'like', '%' . $this->search_input . '%')->orderBy('id', 'DESC')->orderBy('id', 'desc')->paginate(10)
        ]);
    }

    public function edit($id)
    {
        $experience = Experience::findOrFail($id);
        $this->experienceId = $id;
        $this->experience = $experience->experience;
        $this->status = $experience->status;
        $this->openModal();
    }
    public function update()
    {
        if ($this->experienceId) {
            $post = Experience::findOrFail($this->experienceId);
            $post->update([
                'experience' => $this->experience,
                'status' => $this->status,
            ]);
            session()->flash('message', 'Experience detail updated sucessfully');
            return redirect()->to('/admin/experience');
        }
    }
    public function delete($id)
    {
        Experience::find($id)->delete();
        session()->flash('message', 'Experience detail deleted sucessfully');
        return redirect()->to('/admin/experience');
    }
}
