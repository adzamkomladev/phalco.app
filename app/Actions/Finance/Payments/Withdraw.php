<?php

namespace App\Actions\Finance\Payments;

use Bavix\Wallet\Models\Wallet;
use Lorisleiva\Actions\Concerns\AsAction;

use function Hybridly\view;

class Withdraw
{
    use AsAction;

    public function asController(int $walletId)
    {
        $wallet = $this->handle($walletId);

        return view('finance.withdraw', [
            'wallet_id' => $walletId,
            'wallet_name' => $wallet?->name,
        ])->base('finance.index');
    }

    public function handle(int $walletId)
    {
        return Wallet::find($walletId);
    }
}
