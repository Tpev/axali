<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Project;

class ProjectTable extends Component
{
    use WithPagination;

    public string $search = '';

    public function updatingSearch() { $this->resetPage(); }

    public function render()
    {
        $projects = Project::with('deal.customer')
            ->when($this->search, fn($q) =>
                $q->where('code','like',"%{$this->search}%")
                  ->orWhere('stage','like',"%{$this->search}%"))
            ->latest()
            ->paginate(10);

        return view('livewire.admin.project-table', [
            'projects' => $projects,
        ])->layout('layouts.admin', ['title' => 'Projects']);
    }
}
