<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Component;

class Homepage extends Component
{
    public function render()
    {
        return view('livewire.homepage', [
            'jobs' => Job::orderBy('id', 'DESC')->get()
        ]);
    }
}
