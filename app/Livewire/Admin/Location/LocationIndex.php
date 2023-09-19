<?php

namespace App\Livewire\Admin\Location;

use App\Models\Location;
use Livewire\Component;
use Livewire\WithPagination;

class LocationIndex extends Component
{
    use WithPagination;

    public $search_input = '';

    public function search()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.location.location-index', [
            'locations' => Location::where('city_name', 'like', '%' . $this->search_input . '%')->paginate(5)
        ]);
    }

    public function delete($id)
    {
        Location::find($id)->delete();
        session()->flash('success', 'location deleted successfully.');
        $this->reset('city_name');
    }

}
