<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\RecruiterLogin;
use App\Livewire\Auth\RecruiterRegister;
use App\Livewire\Auth\Register;
use App\Livewire\Homepage;
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

// Route::get('/', function () {
//     return view('components.layouts.app');
// });

Route::get('/', Homepage::class);

Route::get('/register', Register::class)->name('register');

Route::get('/login', Login::class)->name('login');
Route::get('/recruiter-login', RecruiterLogin::class)->name('recruiter-login');
Route::get('/recruiter-register', RecruiterRegister::class)->name('recruiter-register');
