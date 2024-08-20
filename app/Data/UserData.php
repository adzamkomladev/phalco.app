<?php

namespace App\Data;

use App\Data\Organizations\OrganizationData;
use Carbon\CarbonInterface;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

final class UserData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly ?string $avatar,
        public readonly string $email,
        public readonly ?CarbonInterface $email_verified_at,
        public readonly ?OrganizationData $current_organization,
        #[DataCollectionOf(OrganizationData::class)]
        public readonly DataCollection $member_organizations
    ) {}
}
