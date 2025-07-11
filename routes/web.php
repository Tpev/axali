<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Homepage;

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
