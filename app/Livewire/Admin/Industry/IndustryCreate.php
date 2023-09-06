<?php

namespace App\Livewire\Admin\Industry;

use App\Models\Industry;
use Livewire\Attributes\Rule;
use Livewire\Component;

class IndustryCreate extends Component
{
    #[Rule('required|min:3')]
    public  $industry_name = '';

    public function resetInputFields()
    {
        $this->industry_name = '';
    }

    public function store()
    {
        $this->validate();
        Industry::create([
            'industry_name' => $this->industry_name,
        ]);
        session()->flash('message', 'Industry is created sucessfully');
        $this->resetInputFields();
        return redirect('/admin/industry');
    }

    public function render()
    {
        return view('livewire.admin.industry.industry-create');
    }
}
