<?php

namespace App\Livewire\Component\Layouts;

use App\Models\PostJob;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{
    public $search_input = '';
    public $records;

    public function searchJobResult()
    {
        $this->records = PostJob::orderby('id', 'DESC')->where('job_headline', 'like', '%' . $this->search_input . '%')->get();
        return  redirect('jobs/search/' . $this->search_input);
    }

    public function logout()
    {
        Auth::logout();
        session()->flash('message', 'You are logout sucessfully.');
        return redirect()->to('/login');
    }

    public function render()
    {
        return view('livewire.component.layouts.header');
    }
}
