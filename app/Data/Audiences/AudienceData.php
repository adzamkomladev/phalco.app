<?php

namespace App\Data\Audiences;

use Spatie\LaravelData\Data;

class AudienceData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly ?int $userId,
        public readonly ?int $organizationId,
        public readonly string $name,
        public readonly ?string $description,
        public readonly string $status,
        public readonly ?string $createdAt,
        public readonly ?string $updatedAt,
        public readonly ?int $contacts
    ) {}
}
