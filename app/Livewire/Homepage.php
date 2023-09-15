<?php

namespace App\Livewire;

use App\Models\PostJob;
use Livewire\Component;

class Homepage extends Component
{
    public function render()
    {
        return view('livewire.homepage', [
            'jobs' => PostJob::orderBy('id', 'DESC')->get()
        ]);
    }
}
