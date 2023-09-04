<?php

namespace App\Livewire\Job;

use App\Models\Job;
use Livewire\Component;

class JobView extends Component
{
    public $detail;
    public function mount($id)
    {
        $this->detail = Job::find($id);
    }

    public function render()
    {
        return view('livewire.job.job-view', [
            'job' =>  $this->detail
        ]);
    }
}
