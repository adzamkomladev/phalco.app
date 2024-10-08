<?php

namespace App\Data\Elections;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

final class ElectionDetailsData extends Data
{
    public function __construct(
        #[DataCollectionOf(ElectionData::class)]
        public readonly DataCollection $all,
        public readonly ?ElectionData $selected
    ) {}
}
