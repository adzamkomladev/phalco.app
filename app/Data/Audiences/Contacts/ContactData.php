<?php

namespace App\Data\Audiences\Contacts;

use Spatie\LaravelData\Data;

class ContactData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly int $userId,
        public readonly int $audienceId,
        public readonly string $firstName,
        public readonly string $lastName,
        public readonly ?string $otherNames,
        public readonly ?string $gender,
        public readonly ?string $dateOfBirth,
        public readonly ?string $avatar,
        public readonly string $email,
        public readonly string $phone,
        public readonly ?string $address,
        public readonly ?string $city,
        public readonly ?string $state,
        public readonly ?string $country,
        public readonly ?string $createdAt,
        public readonly ?string $updatedAt,
    ) {}
}
