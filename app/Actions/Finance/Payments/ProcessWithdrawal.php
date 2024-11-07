<?php

namespace App\Actions\Finance\Payments;

use Lorisleiva\Actions\Concerns\AsAction;

class ProcessWithdrawal
{
    use AsAction;

    public string $jobQueue = 'payments';


    public function asJob(int $paymentId): void
    {
        try {
            $this->handle($paymentId);
        } catch (\Exception $e) {
            logger()->error('Failed to process withdrawal', ['error' => $e->getMessage()]);
        }
    }

    public function handle(int $paymentId)
    {
        // ...
    }
}
