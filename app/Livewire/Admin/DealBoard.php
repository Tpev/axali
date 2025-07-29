<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Url;
use App\Models\{Deal, DealStageSnapshot, User};

class DealBoard extends Component
{
    /* ── Static stage list ────────────────────────────────────── */
    public array $stages = ['lead', 'quoted', 'active', 'closing', 'won', 'lost'];

    /* ── URL‑persisted filters ───────────────────────────────── */
    #[Url] public string $search = '';
    #[Url] public string $owner  = 'all';

    /* ── UI state ─────────────────────────────────────────────── */
    public ?int $detail = null;                       // selected deal ID

    /* ── Sparkline mini‑charts (last 30 days) ────────────────── */
    public array $sparkline = [];

    public function mount(): void
    {
        $snap = DealStageSnapshot::whereBetween('date', [now()->subDays(29), now()])
            ->orderBy('date')
            ->get()
            ->groupBy('stage');

        foreach ($this->stages as $s) {
            $this->sparkline[$s] = ($snap[$s] ?? collect())->pluck('count')->all();
        }
    }

    /* ── Card click / close ──────────────────────────────────── */
    public function selectDeal(int $id): void
    {
        $this->detail = $id;
    }

    public function closeDetail(): void
    {
        $this->detail = null;
    }

    /* ── Utility: age in current stage ───────────────────────── */
    public function ageInStage(Deal $d): int
    {
        $last = $d->stageChanges()->latest('changed_at')->first();

        return $last
            ? now()->diffInDays($last->changed_at)
            : now()->diffInDays($d->created_at);
    }

    /* ── Render ──────────────────────────────────────────────── */
    public function render()
    {
        $deals = Deal::with(['customer', 'owner', 'stageChanges'])
            ->when($this->search, fn ($q) =>
                $q->where('name', 'like', "%{$this->search}%")
                  ->orWhereHas('customer', fn ($qq) =>
                      $qq->where('company_name', 'like', "%{$this->search}%")))
            ->when($this->owner !== 'all', fn ($q) =>
                $q->where('owner_id', $this->owner))
            ->get()
            ->groupBy('stage');

        return view('livewire.admin.deal-board', [
            'board'    => $deals,
            'owners'   => User::where('is_admin', true)->get(['id', 'name']),
            'selected' => $this->detail
                ? Deal::with(['customer', 'owner', 'stageChanges'])->find($this->detail)
                : null,
        ])->layout('layouts.admin', ['title' => 'Deals']);
    }
}
