<?php

namespace App\Data\Settings\Team;

use Spatie\LaravelData\Data;

class InvitationStatsChangeData extends Data
{
    public function __construct(
        public readonly int $total,
        public readonly float $percentage
    ) {}
}
