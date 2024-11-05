<?php

namespace App\Actions\Finance\Payments\Methods;

use Lorisleiva\Actions\Concerns\AsAction;

use function Hybridly\view;

class Index
{
    use AsAction;

    public function asController()
    {
        return view('finance.payments.methods.index', [
            'payment_methods' => []
        ])->base('finance.index');
    }

    public function handle()
    {
        // ...
    }
}
