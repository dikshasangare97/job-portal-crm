<?php

namespace App\Livewire\Admin\Workmode;

use App\Models\Workmode;
use Livewire\Attributes\Rule;
use Livewire\Component;

class WorkmodeCreate extends Component
{

    #[Rule('required|min:3')]
    public  $work_mode_name = '';
 

    public function resetInputFields()
    {
        $this->work_mode_name = '';
    }
    
    public function store()
    {
        $this->validate();
        Workmode::create([
            'work_mode_name' => $this->work_mode_name,
        ]);
        session()->flash('message', 'Workmode is created sucessfully');
        $this->resetInputFields();
        return redirect('/admin/workmode');
    }


    public function render()
    {
        return view('livewire.admin.workmode.workmode-create');
    }
}
