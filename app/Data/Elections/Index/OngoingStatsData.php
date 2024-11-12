<?php

namespace App\Data\Elections\Index;

use Spatie\LaravelData\Data;

class OngoingStatsData extends Data
{
    public function __construct(
        public readonly int $totalVoters,
        public readonly int $totalVotersChange,
        public readonly int $daysLeft,
        public readonly float $completionPercentage
    ) {}
}
