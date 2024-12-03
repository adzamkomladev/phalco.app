<?php

namespace App\Actions\Finance;

use App\Models\Organization;
use Illuminate\Support\Facades\Concurrency;
use Lorisleiva\Actions\Concerns\AsAction;

class SetupOrganizationWallets
{
    use AsAction;

    public string $jobQueue = 'default';

    public function asJob(int $organizationId): void
    {
        try {
            $this->handle($organizationId);
        } catch (\Exception $e) {
            logger()->error('Handle setup organization wallets error', ['error' => $e->getMessage()]);
        }
    }

    public function handle(int $organizationId)
    {
        $organization = Organization::find($organizationId);

        Concurrency::run([
            fn() => $organization->hasWallet('default')
                ? $organization->wallet
                : $organization->createWallet([
                    'name' => 'Default',
                    'slug' => 'default'
                ]),
            fn() => $organization->createWallet([
                'name' => 'Nominations',
                'slug' => 'nominations'
            ]),
            fn() => $organization->createWallet([
                'name' => 'Donations',
                'slug' => 'donations'
            ]),
        ]);
    }
}
