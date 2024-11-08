<?php

namespace App\Actions\Finance\Payments;

use App\Models\Payment;
use App\Rules\Finance\AdequateBalance;
use Illuminate\Support\Str;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class InitialWithdrawal
{
    use AsAction;

    public function rules()
    {
        return [
            'amount' => ['required', 'decimal:0,2', 'gt:0', new AdequateBalance],
            'wallet_id' => ['required', 'int', 'exists:wallets,id'],
            'payment_method_id' => ['required', 'int', 'exists:payment_methods,id'],
        ];
    }

    public function asController(ActionRequest $request)
    {
        try {
            $this->handle(auth()->id(), $request->user()->selected_organization_id, $request->validated());

            return back()->with('success', 'Payment initiated!');
        } catch (\Exception $e) {
            logger()->error('Initiate payment error', ['error' => $e->getMessage()]);

            return back()->with('error', $e->getMessage());
        }
    }

    public function handle(int $userId, int $organizationId, array $data)
    {
        $payment = Payment::create([
            'user_id' => $userId,
            'organization_id' => $organizationId,
            'gateway' => 'paystack',
            'amount' => $data['amount'] * 100,
            'currency' => 'GHS',
            'status' => 'initiated',
            'reference' => (string) Str::ulid(),
            'description' => 'Wallet withdrawal',
            'metadata' => [
                'wallet_id' => $data['wallet_id'],
                'payment_method_id' => $data['payment_method_id'],
            ],
        ]);

        ProcessWithdrawal::dispatch($payment->id);
    }
}
