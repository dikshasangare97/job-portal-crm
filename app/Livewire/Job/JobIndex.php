<?php

namespace App\Livewire\Job;

use App\Models\Job;
use Livewire\Component;
use Livewire\WithPagination;

class JobIndex extends Component
{
    use WithPagination;
    public $records;
    public function mount($search)
    {
        $this->records = Job::orderby('id', 'DESC')
            ->where('job_headline', 'like', '%' . $search . '%')
            ->orWhere('employment_type', 'like', '%' . $search . '%')
            ->orWhere('key_skill', 'like', '%' . $search . '%')->get();
    }

    public function render()
    {
        return view('livewire.job.job-index', [
            'jobs' =>  $this->records
        ]);
    }
}
