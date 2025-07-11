<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Lead;

class LeadsTable extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.admin.leads-table', [
            'leads' => Lead::latest()->paginate(10),
        ])->layout('layouts.app');
    }
}
