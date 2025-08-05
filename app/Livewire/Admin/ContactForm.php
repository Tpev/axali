<?php
// app/Livewire/Admin/ContactForm.php
namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\{Company, Contact};

class ContactForm extends Component
{
    public Company  $company;
    public ?Contact $contact = null;

    /* form fields */
    public $first_name, $last_name, $email, $phone, $position;

    /* NEW: modal visibility */
    public bool $show = false;

    protected $listeners = ['openContactForm' => 'open'];   // listens to JS

    protected $rules = [
        'first_name' => 'required|string|max:50',
        'last_name'  => 'required|string|max:50',
        'email'      => 'required|email',
        'phone'      => 'nullable|string|max:50',
        'position'   => 'nullable|string|max:100',
    ];

    public function mount(Company $company) { $this->company = $company; }

    /** Open for create or edit */
    public function open($contactId = null)
    {
        $this->resetValidation();
        $this->contact = $contactId ? Contact::findOrFail($contactId) : null;

        if ($this->contact) {
            $this->fill($this->contact->toArray());
        } else {
            $this->reset(['first_name','last_name','email','phone','position']);
        }

        $this->show = true;
    }

    public function close()  { $this->show = false; }

    public function save()
    {
        $data = $this->validate();

        $this->contact
            ? $this->contact->update($data)
            : $this->company->contacts()->create($data);

        $this->dispatch('contact-saved');
        $this->close();
    }

    public function render()
    {
        return view('livewire.admin.contact-form');
    }
}
