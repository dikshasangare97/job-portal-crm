<?php

namespace App\Livewire\Admin\Workmode;

use App\Models\Workmode;
use Livewire\Component;
use Livewire\WithPagination;

class WorkmodeIndex extends Component
{

    use WithPagination;

    public $search_input = '';
    
    public function search()
    {
        $this->resetPage();
    }


    public function render()
    {
        return view('livewire.admin.workmode.workmode-index',[
            
                'workmodes' => Workmode::where('work_mode_name', 'like', '%' . $this->search_input . '%')->paginate(5)
    
        ]);
    }

    public function delete($id)
    {
        Workmode::find($id)->delete();
        session()->flash('success', 'workmode deleted successfully.');
        $this->reset('work_mode_name');
    }
}
