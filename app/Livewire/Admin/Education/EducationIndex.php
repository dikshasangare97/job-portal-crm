<?php

namespace App\Livewire\Admin\Education;

use App\Models\Education;
use Livewire\Component;
use Livewire\WithPagination;

class EducationIndex extends Component
{
    use WithPagination;

    public $search_input = '';

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
}
