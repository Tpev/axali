<?php
namespace App\Observers;

use App\Models\{Deal, DealStageChange};

class DealObserver
{
    public function updating(Deal $deal): void
    {
        if ($deal->isDirty('stage')) {
            DealStageChange::create([
                'deal_id'    => $deal->id,
                'from'       => $deal->getOriginal('stage'),
                'to'         => $deal->stage,
                'changed_at' => now(),
            ]);
        }
    }
}
