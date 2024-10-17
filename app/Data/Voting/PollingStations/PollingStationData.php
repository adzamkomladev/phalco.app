<?php

namespace App\Data\Voting\PollingStations;

use Spatie\LaravelData\Data;

class PollingStationData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly ?string $name,
        public readonly ?string $code
    ) {}
}
