<?php

namespace App\Data\Finance;

use Spatie\LaravelData\Data;

class WalletData extends Data
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly int $balance
    ) {}
}
