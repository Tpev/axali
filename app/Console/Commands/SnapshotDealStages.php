<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\{Deal, DealStageSnapshot};

class SnapshotDealStages extends Command
{
    protected $signature = 'deals:snapshot';
    protected $description = 'Store daily deal counts per stage';

    public function handle(): void
    {
        $today = now()->toDateString();
        foreach (['lead','quoted','active','closing','won','lost'] as $stage) {
            DealStageSnapshot::updateOrCreate(
                ['date'=>$today,'stage'=>$stage],
                ['count'=>Deal::where('stage',$stage)->count()]
            );
        }
        $this->info("Snapshot completed for $today");
    }
}
