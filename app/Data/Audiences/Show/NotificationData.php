<?php

namespace App\Data\Audiences\Show;

use Spatie\LaravelData\Data;

class NotificationData extends Data
{
    public function __construct(
        public readonly CreatorData $creator,
        public readonly string $title,
        public readonly string $type,
        public readonly int $percentageCompleted,
        public readonly string $broadcastTopic,
        public readonly string $createdAt
    ) {}
}
