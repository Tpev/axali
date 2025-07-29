<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class PrivacyTerms extends Component
{
public function render()
{
    return view('livewire.pages.privacy-terms')
        ->layout('layouts.guest');   // <— use your guest layout
}

}
