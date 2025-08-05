<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Company;

class CompaniesTable extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $companies = Company::query()
            ->when($this->search, fn($q) =>
                $q->where('name','like',"%{$this->search}%"))
            ->paginate(10);

			return view('livewire.admin.companies-table', [
					'companies'=>$companies,
				])->layout('livewire-layouts.admin', ['title'=>'Companies']);

    }
}
