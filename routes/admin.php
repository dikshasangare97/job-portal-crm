<?php

use App\Livewire\Admin\Auth\Dashboard;
use App\Livewire\Admin\Auth\Login;
use App\Livewire\Admin\CompanyType\CompanyTypeCreate;
use App\Livewire\Admin\CompanyType\CompanyTypeIndex;
use App\Livewire\Admin\Department\DepartmentCreate;
use App\Livewire\Admin\Department\DepartmentIndex;
use App\Livewire\Admin\Education\EducationCreate;
use App\Livewire\Admin\Education\EducationIndex;
use App\Livewire\Admin\Experience\ExperienceCreate;
use App\Livewire\Admin\Experience\ExperienceIndex;
use App\Livewire\Admin\Industry\IndustryCreate;
use App\Livewire\Admin\Industry\IndustryIndex;
use App\Livewire\Admin\JobRole\JobRoleCreate;
use App\Livewire\Admin\JobRole\JobRoleIndex;
use App\Livewire\Admin\Location\LocationCreate;
use App\Livewire\Admin\Location\LocationIndex;
use App\Livewire\Admin\PostJob\PostJobCreate;
use App\Livewire\Admin\PostJob\PostJobIndex;
use App\Livewire\Admin\RoleCategory\RoleCategoryCreate;
use App\Livewire\Admin\RoleCategory\RoleCategoryIndex;
use App\Livewire\Admin\Skills\SkillsCreate;
use App\Livewire\Admin\Skills\SkillsIndex;
use App\Livewire\Admin\Workmode\WorkmodeCreate;
use App\Livewire\Admin\Workmode\WorkmodeIndex;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "admin" middleware group. Make something great!
|
*/


Route::get('/admin/login', Login::class)->name('admin.login');

Route::get('/admin', Dashboard::class)->middleware(['admin']);

Route::get('/admin/company-type', CompanyTypeIndex::class)->name('admin.company-type.index')->middleware(['admin']);
Route::get('/admin/company-type/create', CompanyTypeCreate::class)->name('admin.company-type.create')->middleware(['admin']);

Route::get('/admin/education', EducationIndex::class)->name('admin.education.index')->middleware(['admin']);
Route::get('/admin/education/create', EducationCreate::class)->name('admin.education.create')->middleware(['admin']);

Route::get('/admin/industry', IndustryIndex::class)->name('admin.industry.index')->middleware(['admin']);
Route::get('/admin/industry/create', IndustryCreate::class)->name('admin.industry.create')->middleware(['admin']);

Route::get('/admin/location', LocationIndex::class)->name('admin.location.index')->middleware(['admin']);
Route::get('/admin/location/create', LocationCreate::class)->name('admin.location.create')->middleware(['admin']);

Route::get('/admin/role', RoleCategoryIndex::class)->name('admin.role.index')->middleware(['admin']);
Route::get('/admin/role/create', RoleCategoryCreate::class)->name('admin.role.create')->middleware(['admin']);

Route::get('/admin/department', DepartmentIndex::class)->name('admin.department.index')->middleware(['admin']);
Route::get('/admin/department/create', DepartmentCreate::class)->name('admin.department.create')->middleware(['admin']);

Route::get('/admin/workmode', WorkmodeIndex::class)->name('admin.workmode.index')->middleware(['admin']);
Route::get('/admin/workmode/create', WorkmodeCreate::class)->name('admin.workmode.create')->middleware(['admin']);

Route::get('/admin/experience', ExperienceIndex::class)->name('admin.experience.index')->middleware(['admin']);
Route::get('/admin/experience/create', ExperienceCreate::class)->name('admin.experience.create')->middleware(['admin']);
 
Route::get('/admin/jobrole', JobRoleIndex::class)->name('admin.jobrole.index')->middleware(['admin']);
Route::get('/admin/jobrole/create', JobRoleCreate::class)->name('admin.jobrole.create')->middleware(['admin']);

Route::get('/admin/skills', SkillsIndex::class)->name('admin.skills.index')->middleware(['admin']);
Route::get('/admin/skills/create', SkillsCreate::class)->name('admin.skills.create')->middleware(['admin']);

Route::get('/admin/post-job', PostJobIndex::class)->name('admin.post-job.index')->middleware(['admin']);
Route::get('/admin/post-job/create', PostJobCreate::class)->name('admin.post-job.create')->middleware(['admin']);