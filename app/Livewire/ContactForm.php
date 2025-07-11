<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Log;
use App\Models\Lead;

class ContactForm extends Component
{
    public string $name = '';
    public string $email = '';
    public string $message = '';

    /** When true, we render the thank-you view */
    public bool $sent = false;

    protected $rules = [
        'name'    => 'required|min:2',
        'email'   => 'required|email',
        'message' => 'required|min:10|max:1500',
    ];

    public function submit(): void
    {
        $data = $this->validate();
        Log::info('Lead validated', $data);

        Lead::create($data);
        Log::info('Lead saved', $data);

        $this->reset(['name', 'email', 'message']);   // clear inputs
        $this->sent = true;                           // trigger thanks view
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
