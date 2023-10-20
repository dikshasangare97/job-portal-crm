<?php

namespace App\Livewire\Admin\PostJob;

use App\Models\PostJob;
use Livewire\Component;

class PostJobView extends Component
{
    public $detail;
    public function mount($id)
    {
        $this->detail = PostJob::find($id);
    }

    public function render()
    {
        return view('livewire.admin.post-job.post-job-view',[
            'job' =>  $this->detail
        ]);
    }
}
