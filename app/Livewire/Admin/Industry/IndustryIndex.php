<?php

namespace App\Livewire\Admin\Industry;

use App\Models\Industry;
use Livewire\Component;
use Livewire\WithPagination;

class IndustryIndex extends Component
{
    use WithPagination;

    public $search_input = '';

    public function search()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.industry.industry-index', [
            'industries' => Industry::where('industry_name', 'like', '%' . $this->search_input . '%')->paginate(5)
        ]);
    }
    public function delete($id)
    {
        Industry::find($id)->delete();
        session()->flash('success', 'industry deleted successfully.');
        $this->reset('industry_name');
    }
    
}
