<?php

namespace App\Data\Settings\Team;

use Spatie\LaravelData\Data;

class InvitationStatsData extends Data
{
    public function __construct(
        public readonly int $totalMembers,
        public readonly InvitationStatsChangeData $changeMembers,
        public readonly int $totalInvites,
        public readonly InvitationStatsChangeData $changeInvites,
        public readonly int $totalRejections,
        public readonly InvitationStatsChangeData $changeRejections,
    ) {}
}
