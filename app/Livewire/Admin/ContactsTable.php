<?php
namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Company;

class ContactsTable extends Component
{
    use WithPagination;

    public Company $company;
    public $search = '';

    public function render()
    {
        $contacts = $this->company->contacts()
            ->when($this->search, fn($q) =>
                $q->whereRaw("concat(first_name,' ',last_name) like ?", ["%{$this->search}%"]))
            ->orderBy('last_name')
            ->paginate(8);

        return view('livewire.admin.contacts-table', [
            'contacts'=>$contacts,
        ]);
    }
}
