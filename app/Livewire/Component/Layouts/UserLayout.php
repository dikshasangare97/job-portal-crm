<?php

namespace App\Livewire\Component\Layouts;

use App\Models\PostJob;
use Livewire\Component;

class UserLayout extends Component
{
    public $search_input = '';
    public $records;

    public function render()
    {
        return view('livewire.component.layouts.user-layout');
    }

    public function searchJobResult()
    {
        $this->records = PostJob::orderby('id', 'DESC')->where('job_headline', 'like', '%' . $this->search_input . '%')->orWhere('status', 1)->get();
        return  redirect('jobs/search/' . $this->search_input);
    }
}
