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
   public  $education_name;

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
            'educations' => Education::where('education_name', 'like', '%' . $this->search_input . '%')->paginate(5)
        ]);
    }

    public function edit($id)
    {
        
        $education = Education::findOrFail($id);   
        $this->educationId = $id;
        $this-> education_name = $education->education_name;
        $this->openModal();
    }
   
    public function update()
    {
        if ($this->educationId) {
            $post = Education::findOrFail($this->educationId);
            $post->update([
                'education_name' => $this->education_name,
                
            ]);
            session()->flash('success', 'Department updated successfully.');
            $this->closeModal();
            $this->reset('education_name', 'educationId');
        }  
    }

    public function delete($id)
    {
        Education::find($id)->delete();
        session()->flash('success', 'education deleted successfully.');
        $this->reset('education_name');
    }
}
