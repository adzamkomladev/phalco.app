<?php

namespace App\Actions\Campaigns\Sms;

use App\Data\Finance\WalletData;
use App\Models\Audience;
use App\Models\SmsSender;
use Bavix\Wallet\Models\Wallet;
use Laravel\Octane\Facades\Octane;
use Lorisleiva\Actions\Concerns\AsAction;

class Create
{
    use AsAction;

    public function asController()
    {
        return hybridly('campaigns.sms.create', $this->handle(request()->user()->selected_organization_id));
    }

    public function handle(int $organizationId)
    {
        [
            $senders,
            $audiences,
            $wallets
        ] = Octane::concurrently([
            fn () => SmsSender::select(['id', 'organization_id', 'sender', 'status'])
                ->where('organization_id', $organizationId)
                ->where('status', 'approved')
                ->get(),
            fn () => Audience::select(['id', 'organization_id', 'name', 'status'])
                ->withCount('contacts as contacts')
                ->where('organization_id', $organizationId)
                ->where('status', 'active')
                ->get(),
            fn () => Wallet::select(['id', 'holder_type', 'holder_id', 'slug', 'name', 'balance', 'decimal_places'])
                ->where('holder_type', 'organization')
                ->where('holder_id', $organizationId)
                ->get(),
        ]);

        return [
            'senders' => $senders,
            'audiences' => $audiences,
            'wallets' => WalletData::collect(
                $wallets->map(fn ($wallet) => [
                    'id' => $wallet->id,
                    'name' => $wallet->name,
                    'balance' => ($wallet?->balanceInt ?? 0) / 100,
                ])->toArray()
            ),
        ];
    }
}
