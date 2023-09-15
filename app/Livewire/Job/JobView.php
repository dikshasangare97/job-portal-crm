<?php

namespace App\Livewire\Job;

use App\Models\PostJob;
use Livewire\Component;

class JobView extends Component
{
    public $detail;
    public function mount($id)
    {
        $this->detail = PostJob::find($id);
    }

    public function render()
    {
        return view('livewire.job.job-view', [
            'job' =>  $this->detail
        ]);
    }
}
