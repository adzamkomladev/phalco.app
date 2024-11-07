<?php

namespace App\Actions\Finance\Transactions;

use Lorisleiva\Actions\Concerns\AsAction;

use function Hybridly\view;

class Show
{
    use AsAction;

    public function asController(int $id)
    {
        return view('finance.transactions.show', $this->handle($id))
            ->base('finance.index');
    }
    public function handle(int $transactionId)
    {
        return [
            'transaction' => 'transaction',
        ];
    }
}
