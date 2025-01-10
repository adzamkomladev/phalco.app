<?php

namespace App\Data\Finance;

use Spatie\LaravelData\Data;

class PaymentMethodData extends Data
{
    public function __construct(
        public ?int $id,
        public string $account_name,
        public string $account_number,
        public string $channel_code,
        public string $channel_name,
        public string $network_code,
        public string $network_name,
        public string $gateway,
        public string $currency,
        public string $status
    ) {}
}
