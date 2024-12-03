<?php

namespace App\Actions\Finance\Payments;

use App\Data\Finance\PaymentMethodData;
use App\Models\PaymentMethod;
use Bavix\Wallet\Models\Wallet;
use Laravel\Octane\Facades\Octane;
use Lorisleiva\Actions\Concerns\AsAction;

use function Hybridly\view;

class Withdraw
{
    use AsAction;

    public function asController(int $walletId)
    {
        return view('finance.withdraw', $this->handle(request()->user()->selected_organization_id, $walletId))
            ->base('finance.index');
    }

    public function handle(int $organizationId, int $walletId)
    {
        [
            $paymentMethods,
            $wallet
        ] = Octane::concurrently([
            fn () => PaymentMethod::where('organization_id', $organizationId)->get(),
            fn () => Wallet::find($walletId),
        ]);

        return [
            'walletId' => $walletId,
            'walletName' => $wallet?->name,
            'methods' => PaymentMethodData::collect($paymentMethods),
        ];
    }
}
