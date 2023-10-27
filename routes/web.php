<?php

use App\Livewire\Auth\ChangePassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Profile;
use App\Livewire\Auth\RecruiterLogin;
use App\Livewire\Auth\RecruiterRegister;
use App\Livewire\Auth\Register;
use App\Livewire\Homepage;
use App\Livewire\Job\JobCreate;
use App\Livewire\Job\JobIndex;
use App\Livewire\Job\JobSearch;
use App\Livewire\Job\JobView;
use App\Livewire\Recruiter\Job\JobEdit;
use App\Livewire\Recruiter\Job\JobListing;
use App\Livewire\Recruiter\Job\JobPosting;
use App\Livewire\Recruiter\Jobapplication\JobApplication;
use App\Livewire\Recruiter\Jobapplication\JobApplicationView;
use App\Livewire\User\Application\ApplicationStatus;
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

require __DIR__ . '/admin.php';

// Route::get('/', function () {
//     return view('components.layouts.app');
// });

Route::get('/', Homepage::class);

Route::get('/register', Register::class)->name('register');

Route::get('/login', Login::class)->name('login');
Route::get('/recruiter-login', RecruiterLogin::class)->name('recruiter-login');
Route::get('/recruiter-register', RecruiterRegister::class)->name('recruiter-register');

Route::get('/recruiter/jobs', JobListing::class)->name('recruiter.jobs');
Route::get('/recruiter/job-posting', JobPosting::class)->name('recruiter.job-posting');
Route::get('/recruiter/job/{id}/edit', JobEdit::class)->name('recruiter.job.edit');
Route::get('/jobs/search/{search}', JobSearch::class)->name('jobs.search');
Route::get('/jobs', JobIndex::class)->name('jobs');
Route::get('/job/{id}/view', JobView::class)->name('jobs.view');

Route::get('/recruiter/job/{id}/applications', JobApplication::class)->name('recruiter.job.applications');
Route::get('/recruiter/job/{jobId}/applications/view/{userId}', JobApplicationView::class)->name('recruiter.job.applications.view');

Route::get('user/profile', Profile::class)->name('user.profile');
Route::get('user/myapply', ApplicationStatus::class)->name('user.myapply');
Route::get('change-password', ChangePassword::class)->name('change-password');
