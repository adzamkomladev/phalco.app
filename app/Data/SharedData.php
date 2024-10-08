<?php

namespace App\Data;

use App\Data\Elections\ElectionDetailsData;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class SharedData extends Data
{
    public function __construct(
        public readonly SecurityData $security,
        public readonly ElectionDetailsData $elections,
        public readonly ?FlashBagData $flash,
    ) {}
}
