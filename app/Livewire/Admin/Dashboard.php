<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\{Deal, Project, Invoice};

class Dashboard extends Component
{
    public int $openDeals;
    public int $projectsActive;
    public float $unpaidInvoices;

    public function mount(): void
    {
        $this->openDeals      = Deal::whereNotIn('stage',['won','lost'])->count();
        $this->projectsActive = Project::where('percent_complete','<',100)->count();
        $this->unpaidInvoices = Invoice::where('status','!=','paid')->sum('amount');
    }

    public function render()
    {
        return view('livewire.admin.dashboard')
            ->layout('layouts.admin', ['title' => 'Dashboard']);
    }
}
