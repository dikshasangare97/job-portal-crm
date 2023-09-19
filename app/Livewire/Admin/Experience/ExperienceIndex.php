<?php

namespace App\Livewire\Admin\Experience;

use App\Models\Experience;
use Livewire\Component;
use Livewire\WithPagination;

class ExperienceIndex extends Component
{
    use WithPagination;

    public $search_input = '';
    
    public function search()
    {
        $this->resetPage();
    }


    public function render()
    {
        return view('livewire.admin.experience.experience-index',[
            'experiences' => Experience::where('experience', 'like', '%' . $this->search_input . '%')->orderBy('id', 'DESC')->paginate(5)
        ]);
    }

    public function delete($id)
    {
        Experience::find($id)->delete();
        session()->flash('success', 'experience deleted successfully.');
        $this->reset('experience');
    }
}
