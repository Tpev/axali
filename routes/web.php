<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Homepage;
use App\Livewire\Careers;
use App\Livewire\About;
use App\Livewire\DdChecklist;
use App\Livewire\Pages\PrivacyTerms;
use App\Livewire\Admin\{Dashboard, DealBoard, ProjectTable};
use App\Http\Middleware\EnsureIsAdmin;


Route::middleware(['auth', EnsureIsAdmin::class])   
     ->prefix('admin')
     ->name('admin.')
     ->group(function () {
         Route::get('/',        Dashboard::class)->name('dashboard');
         Route::get('/deals',   DealBoard::class)->name('deals');
         Route::get('/projects',ProjectTable::class)->name('projects');
     });

Route::get('/privacy-terms', PrivacyTerms::class)->name('privacy-terms');

Route::get('/dd-checklist', DdChecklist::class)->name('dd-checklist');

Route::get('/about', About::class)->name('about');

Route::get('/careers', Careers::class)->name('careers');

Route::get('/dog-demo', \App\Livewire\DogProfile::class)->name('dog.demo');

Route::get('/', Homepage::class)->name('home');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/leads', \App\Livewire\Admin\LeadsTable::class)
        ->name('admin.leads');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
