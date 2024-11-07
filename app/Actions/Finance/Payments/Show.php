<?php

namespace App\Actions\Finance\Payments;

use Lorisleiva\Actions\Concerns\AsAction;

use function Hybridly\view;

class Show
{
    use AsAction;

    public function asController(int $id)
    {
        return view('finance.payments.show', $this->handle($id))
            ->base('finance.index');
    }
    public function handle(int $paymentId)
    {
        return [
            'payment' => 'payment',
        ];
    }
}
