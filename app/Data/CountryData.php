<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class CountryData extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly string $code,
        public readonly string $flag,
        public readonly string $currency
    ) {}
}
