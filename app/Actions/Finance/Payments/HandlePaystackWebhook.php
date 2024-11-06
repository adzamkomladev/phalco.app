<?php

namespace App\Actions\Finance\Payments;

use App\Models\Payment;
use Lorisleiva\Actions\Concerns\AsAction;
use Unicodeveloper\Paystack\Facades\Paystack;

class HandlePaystackWebhook
{
    use AsAction;

    public function asController()
    {
        try {
            $data = Paystack::getPaymentData();

            return $this->handle($data) ?
                redirect()->route('finance.index')->with('success', 'Payment successful!') :
            redirect()->route('finance.index')->with('error', 'Payment failed! Please try again.');
        } catch (\Exception $e) {
            logger()->error('Payment callback error', ['error' => $e->getMessage()]);

            return redirect()->route('finance.index')->with('error', 'Payment failed! Please try again.');
        }
    }

    public function handle(array $data)
    {
        if (! $data['status']) {
            logger()->error('Payment verification failed', ['paymentDetails' => $data]);

            return $this->handleFailedPayment($data);
        }

        $payment = Payment::where('gateway_reference', $data['data']['reference'])->first();

        if (! $payment) {
            logger()->error('Payment not found in database', ['paymentDetails' => $data]);

            return $this->handleFailedPayment($data);
        }

        return $this->handleSuccessfulPayment($payment, $data);
    }

    private function handleSuccessfulPayment(Payment $payment, array $paymentDetails)
    {
        HandleSuccessfulPayment::dispatch($payment->id, $paymentDetails);

        return true;
    }

    private function handleFailedPayment(array $data)
    {
        // TODO: Perform failure clean up

        return false;
    }
}
