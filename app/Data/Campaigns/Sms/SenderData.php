<?php

namespace App\Data\Campaigns\Sms;

use Spatie\LaravelData\Data;

class SenderData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $sender,
        public readonly ?string $reason,
        public readonly string $proofDocsUrl,
        public readonly string $status,
        public readonly ?string $statusReason,
        public readonly ?string $approvedAt,
        public readonly string $createdAt
    ) {}
}
