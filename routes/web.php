<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Homepage;
use App\Livewire\Careers;
use App\Livewire\About;
use App\Livewire\DdChecklist;
use App\Livewire\Pages\PrivacyTerms;
use App\Livewire\Admin\{Dashboard, DealBoard, ProjectTable};
use App\Http\Middleware\EnsureIsAdmin;
use App\Http\Controllers\Admin\DealController;

Route::middleware(['auth', EnsureIsAdmin::class])
     ->prefix('admin')
     ->name('admin.')
     ->group(function () {
		 
// routes/web.php  (inside ->prefix('admin')->name('admin.')->group(...))

Route::get('/companies',           App\Livewire\Admin\CompaniesTable::class)->name('companies');

// CREATE — separate component, no params
Route::get('/companies/create',    App\Livewire\Admin\CompanyCreate::class)
     ->name('companies.create');

// EDIT — numeric constraint avoids conflicts
Route::get('/companies/{company}', App\Livewire\Admin\CompanyEdit::class)
     ->whereNumber('company')
     ->name('companies.edit');





		 
         // board + drawer
         Route::get('/deals',               [DealController::class,'index'])->name('deals');
         Route::get('/deals/{deal}/drawer', [DealController::class,'drawer'])->name('deals.drawer');

         // 🔑 PATCH route now inside same group
         Route::patch('/deals/{deal}',      [DealController::class,'update'])->name('deals.update');

         // other admin pages…
         Route::get('/',  Dashboard::class)->name('dashboard');
         Route::get('/projects', ProjectTable::class)->name('projects');
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
