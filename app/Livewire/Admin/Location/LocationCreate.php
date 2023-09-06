<?php

namespace App\Livewire\Admin\Location;

use App\Models\Location;
use Livewire\Attributes\Rule;
use Livewire\Component;

class LocationCreate extends Component
{
    #[Rule('required|min:3')]
    public  $city_name = '';

    public function resetInputFields()
    {
        $this->city_name = '';
    }

    public function store()
    {
        $this->validate();
        Location::create([
            'city_name' => $this->city_name,
        ]);
        session()->flash('message', 'Location is created sucessfully');
        $this->resetInputFields();
        return redirect('/admin/location');
    }

    public function render()
    {
        return view('livewire.admin.location.location-create');
    }
}
