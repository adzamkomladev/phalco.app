<?php

namespace App\Data\Agents;

use Spatie\LaravelData\Data;

class RequestData extends Data
{
    public function __construct(
        public readonly int $id,
        public readonly string $position,
        public readonly string $description,
        public readonly string $status,
        public readonly ?string $createdAt
    ) {}
}
