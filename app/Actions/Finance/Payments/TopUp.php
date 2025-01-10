<?php

namespace App\Actions\Finance\Payments;

use Bavix\Wallet\Models\Wallet;
use Lorisleiva\Actions\Concerns\AsAction;

use function Hybridly\view;

class TopUp
{
    use AsAction;

    public function asController(int $walletId)
    {
        $wallet = $this->handle($walletId);

        return view('finance.top-up', [
            'walletId' => $walletId,
            'walletName' => $wallet->name,
        ])->base('finance.index');
    }

    public function handle(int $walletId)
    {
        return Wallet::find($walletId);
    }
}
