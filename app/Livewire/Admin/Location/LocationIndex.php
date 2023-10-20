<?php

namespace App\Livewire\Admin\Location;

use App\Models\Location;
use Livewire\Component;
use Livewire\WithPagination;

class LocationIndex extends Component
{
    use WithPagination;
    public $isOpen = 0;
    public $search_input = '';
    public $city_name;
    public $locationId;

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
        return view('livewire.admin.location.location-index', [
            'locations' => Location::where('city_name', 'like', '%' . $this->search_input . '%')->orderBy('id','desc')->paginate(10)
        ]);
    }


    public function edit($id)
    {

        $location = Location::findOrFail($id);
        $this->locationId = $id;
        $this->city_name = $location->city_name;
        $this->openModal();
    }

    public function update()
    {
        if ($this->locationId) {
            $post = Location::findOrFail($this->locationId);
            $post->update([
                'city_name' => $this->city_name,

            ]);
            session()->flash('success', 'Location updated successfully.');
            $this->closeModal();
            $this->reset('city_name', 'locationId');
        }
    }

    public function delete($id)
    {
        Location::find($id)->delete();
        session()->flash('message', 'Location detail deleted sucessfully');
        return redirect()->to('/admin/location');
    }
}
