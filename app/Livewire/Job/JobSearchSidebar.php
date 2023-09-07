<?php

namespace App\Livewire\Job;

use App\Models\CompanyType;
use App\Models\Education;
use App\Models\Industry;
use App\Models\Location;
use App\Models\Role;
use Livewire\Component;

class JobSearchSidebar extends Component
{
    public function render()
    {
        return view('livewire.job.job-search-sidebar', [
            'locations' => Location::orderBy('id', 'DESC')->get(),
            'company_types' => CompanyType::orderBy('id', 'DESC')->get(),
            'role_categories' => Role::orderBy('id', 'DESC')->get(),
            'educations' => Education::orderBy('id', 'DESC')->get(),
            'industries' => Industry::orderBy('id', 'DESC')->get(),
        ]);
    }
}
