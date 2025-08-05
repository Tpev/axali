<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Deal;

class DealDetail extends Component
{
    public ?int $dealId = null;  // nullable keeps Livewire happy

    public function getDealProperty(): ?Deal
    {
        return $this->dealId
            ? Deal::with('customer', 'owner')->find($this->dealId)
            : null;
    }

    public function render()
    {
        return view('livewire.admin.deal-detail', [
            'deal' => $this->deal,   // access via computed property
        ]);
    }
}
