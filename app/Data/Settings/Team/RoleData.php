<?php

namespace App\Data\Settings\Team;

use Spatie\LaravelData\Data;

class RoleData extends Data
{
    public function __construct(
        public int $id,
        public string $name,
        public string $status
    ) {}
}
