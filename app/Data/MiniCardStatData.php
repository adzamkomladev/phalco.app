<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class MiniCardStatData extends Data
{
    public function __construct(
        public readonly string $title,
        public readonly string $value
    ) {}
}
