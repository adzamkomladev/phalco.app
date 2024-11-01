<?php

namespace App\Data\Settings\Team;

use App\Models\OrganizationRole;
use Spatie\LaravelData\Data;

class InvitationData extends Data
{
    public function __construct(
        public string $picture,
        public int $id,
        public string $email,
        public string $expires_at,
        public OrganizationRole $role
    ) {
        //
    }
}
