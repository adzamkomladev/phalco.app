<?php

namespace App\Actions\Finance\Payments;

use App\Models\Payment;
use Bavix\Wallet\Models\Wallet;
use Lorisleiva\Actions\Concerns\AsAction;

class HandleSuccessfulPayment
{
    use AsAction;

    public string $jobQueue = 'payments';

    public function asJob(int $paymentId, array $data): void
    {
        try {
            $this->handle($paymentId, $data);
        } catch (\Exception $e) {
            logger()->error('Handle successful payment error', ['error' => $e->getMessage()]);
        }
    }

    public function handle(int $paymentId, array $data)
    {
        $payment = Payment::find($paymentId);

        $wallet = Wallet::find($payment->metadata['wallet_id']);

        if (! $wallet) {
            logger()
                ->error('Wallet with {wallet_id} not found for payment with gateway reference of {gateway_reference}', [
                    'wallet_id' => $payment->metadata['wallet_id'],
                    'gateway_reference' => $payment->gateway_reference,
                ]);

            return;
        }
        logger('Step 1: This is where you reached');
        $wallet->deposit($payment->amount, [
            'payment_id' => $payment->id,
        ]);
        logger('Step 2: Another one');

        $payment->update([
            'status' => 'success',
            'metadata' => [
                ...$payment->metadata,
                'callback_response' => $data,
            ],
        ]);
    }
}
