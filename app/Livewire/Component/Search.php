<?php

namespace App\Livewire\Component;

use App\Models\PostJob;
use Livewire\Component;

class Search extends Component
{

    public $search_input = '';
    public $records;

    public function searchResult()
    {
        $this->records = PostJob::orderby('id', 'DESC')->where('job_headline', 'like', '%' . $this->search_input . '%')->get();
        return  redirect('jobs/search/' . $this->search_input);
    }
    public function render()
    {
        return view('livewire.component.search');
    }
}
