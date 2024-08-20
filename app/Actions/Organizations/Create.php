<?php

namespace App\Actions\Organizations;

use Lorisleiva\Actions\Concerns\AsAction;

class Create
{
    use AsAction;

    public function asController()
    {
        return hybridly('organizations.create');
    }

    public function handle(): void {}
}
