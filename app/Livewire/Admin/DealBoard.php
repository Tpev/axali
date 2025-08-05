<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Deal;
use App\Models\User;

class DealBoard extends Component
{
    /* Filters */
    public string $search = '';
    public string $owner  = 'all';

    /* UI state */
    public ?int $dealId   = null;   // null = no selection
    public bool $open     = false;  // sidebar visibility

    /* Actions */
    public function selectDeal(int $id): void
    {
        $this->dealId = $id;
        $this->open   = true;       // show sidebar
    }

    public function close(): void
    {
        $this->open = false;        // hide sidebar, keep ID
    }

    /* Helpers */
    public function getDealProperty(): ?Deal
    {
        return $this->dealId ? Deal::with('customer','owner')->find($this->dealId) : null;
    }

    public function ageInStage(Deal $d): int
    {
        return now()->diffInDays($d->stage_updated_at ?? $d->created_at);
    }

    /* View */
    public function render()
    {
        $owners = User::all();
        $stages = ['lead','qualified','proposal','negotiation','won','lost'];
        $board  = $spark = [];

        foreach ($stages as $s) {
            $spark[$s] = collect(range(1,7))->map(fn()=>rand(1,10));

            $q = Deal::whereRaw('LOWER(stage)=?',[$s]);
            if ($this->search)         $q->where('name','like',"%{$this->search}%");
            if ($this->owner!=='all')  $q->where('owner_id',$this->owner);

            $board[$s] = $q->get();
        }

        return view('livewire.admin.deal-board',[
            'owners'=>$owners,
            'stages'=>$stages,
            'board' =>$board,
            'spark' =>$spark,
        ])->layout('layouts.admin');
    }
}
