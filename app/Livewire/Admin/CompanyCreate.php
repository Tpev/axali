<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Company;

class CompanyCreate extends Component
{
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

    public function save()
    {
        $data = $this->validate();
        Company::create($data);

        return redirect()->route('admin.companies')
            ->with('success', 'Company created');
    }

    public function render()
    {
        return view('livewire.admin.company-create')
            ->layout('livewire-layouts.admin', ['title' => 'New Company']);
    }
}
