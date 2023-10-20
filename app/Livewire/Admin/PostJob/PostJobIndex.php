<?php

namespace App\Livewire\Admin\PostJob;

use App\Models\PostJob;
use Livewire\Component;
use Livewire\WithPagination;

class PostJobIndex extends Component
{
    use WithPagination;

    public  $search_input = '';
    public  $job_headline = '';

    public function search()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.post-job.post-job-index', [
            'jobs' => PostJob::with('location','workExperience')->where('job_headline', 'like', '%' . $this->search_input . '%')->orderBy('id','desc')->paginate(20)
        ]);
    }

    public function deleteJob($id)
    {
        PostJob::find($id)->delete();
        session()->flash('message', 'Job detail deleted sucessfully');
        return redirect()->to('/admin/post-job');
    }
}
