<?php

use App\Livewire\Admin\Auth\Dashboard;
use App\Livewire\Admin\Auth\Login;
use App\Livewire\Admin\CompanyType\CompanyTypeCreate;
use App\Livewire\Admin\CompanyType\CompanyTypeIndex;
use App\Livewire\Admin\Education\EducationCreate;
use App\Livewire\Admin\Education\EducationIndex;
use App\Livewire\Admin\Industry\IndustryCreate;
use App\Livewire\Admin\Industry\IndustryIndex;
use App\Livewire\Admin\Location\LocationCreate;
use App\Livewire\Admin\Location\LocationIndex;
use App\Livewire\Admin\RoleCategory\RoleCategoryCreate;
use App\Livewire\Admin\RoleCategory\RoleCategoryIndex;
use App\Livewire\Admin\Salary\SalaryCreate;
use App\Livewire\Admin\Salary\SalaryIndex;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
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
