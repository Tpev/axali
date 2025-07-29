<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Deal;

/**
 * Read‑only slide‑over showing full deal info.
 * It never mutates itself; on close it simply triggers a JS event that
 * the parent board listens to.
 */
class DealDetail extends Component
{
    public Deal $deal;

    public function mount(int $dealId): void
    {
        $this->deal = Deal::with([
            'customer',
            'owner',
            'stageChanges' => fn ($q) => $q->latest('changed_at'),
        ])->findOrFail($dealId);
    }

    public function render()
    {
        return view('livewire.admin.deal-detail');
    }
}
