<?php

namespace App\Livewire\Admin\Education;

use App\Models\Education;
use Livewire\Component;
use Livewire\WithPagination;

class EducationIndex extends Component
{
    use WithPagination;
    public $search_input = '';
    public $isOpen = 0;
    public $educationId;
    public  $education_name, $status;

    public function openModal()
    {
        $this->isOpen = true;
        $this->resetValidation();
    }
    
    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function search()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.education.education-index', [
            'educations' => Education::where('education_name', 'like', '%' . $this->search_input . '%')->orderBy('id', 'desc')->paginate(10)
        ]);
    }

    public function edit($id)
    {
        $education = Education::findOrFail($id);
        $this->educationId = $id;
        $this->education_name = $education->education_name;
        $this->status = $education->status;
        $this->openModal();
    }

    public function update()
    {
        if ($this->educationId) {
            $post = Education::findOrFail($this->educationId);
            $post->update([
                'education_name' => $this->education_name,
                'status' => $this->status,
            ]);
            session()->flash('message', 'Education detail updated sucessfully');
            return redirect()->to('/admin/education');
        }
    }

    public function delete($id)
    {
        Education::find($id)->delete();
        session()->flash('message', 'Education detail deleted sucessfully');
        return redirect()->to('/admin/education');
    }
}
