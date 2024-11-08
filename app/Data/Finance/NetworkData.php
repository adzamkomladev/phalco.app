<?php

namespace App\Data\Finance;

use Spatie\LaravelData\Data;

class NetworkData extends Data
{
    public function __construct(
        public string $name,
        public string $code
    ) {}
}
