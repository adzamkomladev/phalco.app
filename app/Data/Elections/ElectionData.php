<?php

namespace App\Data\Elections;


use Spatie\LaravelData\Data;

final class ElectionData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $name
    ) {}
}
