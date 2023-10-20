<?php

namespace App\Livewire\Admin\Industry;

use App\Models\Industry;
use Livewire\Component;
use Livewire\WithPagination;

class IndustryIndex extends Component
{
    use WithPagination;

    public $search_input = '';
    public $isOpen = 0;
    public $industry_name;
    public $IndustryId;

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

    public function edit($id)
    {

        $industry = Industry::findOrFail($id);
        $this->IndustryId = $id;
        $this->industry_name = $industry->industry_name;
        $this->openModal();
    }

    public function update()
    {
        if ($this->IndustryId) {
            $post = Industry::findOrFail($this->IndustryId);
            $post->update([
                'industry_name' => $this->industry_name,

            ]);
            session()->flash('success', 'Industry updated successfully.');
            $this->closeModal();
            $this->reset('industry_name', 'IndustryId');
        }
    }
    public function render()
    {
        return view('livewire.admin.industry.industry-index', [
            'industries' => Industry::where('industry_name', 'like', '%' . $this->search_input . '%')->orderBy('id','desc')->paginate(10)
        ]);
    }
    public function delete($id)
    {
        Industry::find($id)->delete();
        session()->flash('message', 'Industry detail deleted sucessfully');
        return redirect()->to('/admin/industry');
    }
}
