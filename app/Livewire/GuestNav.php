<?php

namespace App\Livewire;

use Livewire\Component;

class GuestNav extends Component
{
    public array $items = [
        // top-level items; Services has a dropdown in the view
    //    ['label' => 'Case Notes', 'href' => '/cases', 'external' => false],
        ['label' => 'About',      'href' => '/about', 'external' => false],
        ['label' => 'Careers',    'href' => '/careers', 'external' => false],
     //   ['label' => 'Contact',    'href' => '#contact', 'external' => false],
    ];

    public function render()
    {
        return view('livewire.guest-nav');
    }
}
