<?php

namespace App\Actions\Finance\Payments;

use App\Models\Payment;
use Lorisleiva\Actions\Concerns\AsAction;

class HandleSuccessfulPayment
{
    use AsAction;

    public string $jobQueue = 'default';

    public function asJob(int $paymentId, array $data): void
    {
        $this->handle($paymentId, $data);
    }

    public function handle(int $paymentId, array $data)
    {
        $payment = Payment::with(['organization'])->find($paymentId);

        $wallet = $payment->organization->getWallet($payment->metadata['wallet_id']);

        if (!$wallet) {
            return;
        }

        $wallet->deposit($payment->amount, [
            'payment_id' => $payment->id,
        ]);

        $payment->update([
            'status' => 'success',
            'metadata' => [
                ...$payment->metadata,
                'callback_response' => $data
            ]
        ]);
    }
}
