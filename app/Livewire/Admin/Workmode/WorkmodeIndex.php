<?php

namespace App\Livewire\Admin\Workmode;

use App\Models\Workmode;
use Livewire\Component;
use Livewire\WithPagination;

class WorkmodeIndex extends Component
{

    use WithPagination;

    public $isOpen = 0;
    public $workmodeId;
    public $work_mode_name, $status;
    public $search_input = '';

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
        return view('livewire.admin.workmode.workmode-index', [
            'workmodes' => Workmode::where('work_mode_name', 'like', '%' . $this->search_input . '%')->orderBy('id', 'desc')->paginate(10)
        ]);
    }

    public function edit($id)
    {
        $workmode = Workmode::findOrFail($id);
        $this->workmodeId = $id;
        $this->work_mode_name = $workmode->work_mode_name;
        $this->status = $workmode->status;
        $this->openModal();
    }

    public function update()
    {
        if ($this->workmodeId) {
            $post = Workmode::findOrFail($this->workmodeId);
            $post->update([
                'work_mode_name' => $this->work_mode_name,
                'status' => $this->status,
            ]);
            session()->flash('message', 'Workmode detail updated sucessfully');
            return redirect()->to('/admin/workmode');
        }
    }

    public function delete($id)
    {
        Workmode::find($id)->delete();
        session()->flash('message', 'Workmode detail deleted sucessfully');
        return redirect()->to('/admin/workmode');
    }
}
