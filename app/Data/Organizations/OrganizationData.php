<?php

namespace App\Data\Organizations;

use Spatie\LaravelData\Data;

class OrganizationData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public ?int $id,
        public string $name,
        public ?string $description,
        public ?string $logo
    ) {
        //
    }
}
