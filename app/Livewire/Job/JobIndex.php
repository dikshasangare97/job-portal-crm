<?php

namespace App\Livewire\Job;

use App\Models\PostJob;
use Livewire\Component;
use Livewire\WithPagination;

class JobIndex extends Component
{
    use WithPagination;

    public function  render()
    {
        return view('livewire.job.job-index', [
            'jobs' =>  PostJob::with('location', 'industry', 'role', 'education', 'companyType')
                ->orderBy('id', 'DESC')->simplePaginate(15)
        ]);
    }
}
