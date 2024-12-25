<?php

namespace App\Data\Campaigns\Sms;

use Spatie\LaravelData\Data;

class CostData extends Data
{
    public function __construct(
        public readonly int $smsCount,
        public readonly int $totalRecipients,
        public readonly int $messageCost,
        public readonly int $totalCost
    ) {}
}
