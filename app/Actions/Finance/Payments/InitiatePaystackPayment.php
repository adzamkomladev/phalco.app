<?php

namespace App\Actions\Finance\Payments;

use App\Models\Payment;
use App\Models\User;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Unicodeveloper\Paystack\Facades\Paystack;
use Illuminate\Support\Str;

class InitiatePaystackPayment
{
    use AsAction;

    public function rules()
    {
        return [
            'amount' => ['required', 'decimal:0,2', 'gt:0'],
            'wallet_id' => ['required', 'int', 'exists:wallets,id'],
        ];
    }

    public function asController(ActionRequest $request)
    {
        try {
            $url = $this->handle(auth()->id(), $request->user()->selected_organization_id, $request->validated());

            return hybridly()->external($url);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function handle(User $user, int $organizationId, array $data)
    {
        $amount = floatval($data['amount']) * 100;

        $paystackRequest = [
            'amount' => $amount,
            'email' => $user->email,
            'currency' => 'GHS',
            'channel' => ['mobile_money', 'bank', 'card'],
            'metadata' => [
                'description' => 'Wallet top up',
                'type' => 'wallet.top-up',
            ],
            'callback_url' => route('payments.paystack.handle'),
        ];

        $paystackResponse = Paystack::getAuthorizationResponse($paystackRequest);

        Payment::create([
            'user_id' => $user->id,
            'organization_id' => $organizationId,
            'amount' => $amount,
            'gateway' => 'paystack',
            'status' => 'pending',
            'reference' => (string) Str::ulid(),
            'external_reference' => $paystackResponse['data']['reference'],
            'currency' => 'GHS',
            'description' => 'Wallet top up',
            'metadata' => [
                'wallet_id' => $data['wallet_id'],
                'request' => $paystackRequest,
                'response' => $paystackResponse
            ]
        ]);

        return $paystackResponse['data']['authorization_url'];
    }
}
