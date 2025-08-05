<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Company;

class CompanyEdit extends Component
{
    public Company $company;

    public $name, $website, $phone, $street, $city, $country, $notes;

    protected $rules = [
        'name'    => 'required|string|max:255',
        'website' => 'nullable|url',
        'phone'   => 'nullable|string|max:50',
        'street'  => 'nullable|string|max:255',
        'city'    => 'nullable|string|max:100',
        'country' => 'nullable|string|max:100',
        'notes'   => 'nullable|string',
    ];

    public function mount(Company $company)
    {
        $this->company = $company;
        $this->fill($company->only([
            'name','website','phone','street','city','country','notes'
        ]));
    }

    public function save()
    {
        $data = $this->validate();
        $this->company->update($data);

        return redirect()->route('admin.companies')
            ->with('success', 'Company updated');
    }

    public function render()
    {
        return view('livewire.admin.company-edit')
            ->layout('livewire-layouts.admin', ['title' => $this->company->name]);
    }
}
