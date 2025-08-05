<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Company;

class CompanyForm extends Component
{
    public ?Company $company = null;

    public $name,$website,$phone,$street,$city,$country,$notes;

    protected $rules = [
        'name'    => 'required|string|max:255',
        'website' => 'nullable|url',
        'phone'   => 'nullable|string|max:50',
        'street'  => 'nullable|string|max:255',
        'city'    => 'nullable|string|max:100',
        'country' => 'nullable|string|max:100',
        'notes'   => 'nullable|string',
    ];

    public function mount(Company $company = null)
    {
        $this->company = $company;
        if ($company) $this->fill($company->toArray());
    }

    public function save()
    {
        $data = $this->validate();

        $company = $this->company
            ? tap($this->company)->update($data)
            : Company::create($data);

        return redirect()->route('admin.companies')
                         ->with('success','Saved!');
    }

    public function render()
    {
		return view('livewire.admin.company-form')
			->layout('livewire-layouts.admin', [
				'title' => $this->company?->name ?? 'New Company'
			]);

    }
}
