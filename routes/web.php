<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\RecruiterLogin;
use App\Livewire\Auth\RecruiterRegister;
use App\Livewire\Auth\Register;
use App\Livewire\Homepage;
use App\Livewire\Job\JobCreate;
use App\Livewire\Job\JobIndex;
use App\Livewire\Job\JobView;
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

Route::get('/recruiter/job-posting', JobCreate::class)->name('recruiter/job-posting');
Route::get('/jobs/search/{search}', JobIndex::class)->name('jobs.search');
Route::get('/job/{id}/view', JobView::class)->name('jobs.view');
