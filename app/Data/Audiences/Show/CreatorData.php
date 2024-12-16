<?php

namespace App\Data\Audiences\Show;

use Spatie\LaravelData\Data;

class CreatorData extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly string $avatar
    ) {}
}
