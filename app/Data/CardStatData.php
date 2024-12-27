<?php

namespace App\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class CardStatData extends Data
{
    public function __construct(
        public readonly string $title,
        public readonly string $icon,
        public readonly ?string $to,
        #[DataCollectionOf(StatData::class)]
        public readonly DataCollection $stats
    ) {}
}


class StatData extends Data
{
    public function __construct(
        public readonly string $title,
        public readonly float $value
    ) {}
}
