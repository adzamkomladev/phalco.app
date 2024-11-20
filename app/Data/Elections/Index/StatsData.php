<?php

namespace App\Data\Elections\Index;

use Spatie\LaravelData\Data;

class StatsData extends Data
{
    public function __construct(
        public readonly ?OngoingStatsData $ongoing,
        public readonly float $totalSpent,
        public readonly int $totalCampaigns
    ) {}
}
