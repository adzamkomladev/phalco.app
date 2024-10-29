<?php

namespace App\Actions\Finance\Payments;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Unicodeveloper\Paystack\Facades\Paystack;

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
            $url = $this->handle($request->user(), $request->all());
            logger('This is the Paystack URL for payment: {url}', ['url' => $url]);

            return hybridly()->external($url);
        } catch (\Exception $e) {
            dd($e->getMessage());

            return back()->with('error', $e->getMessage());
        }
    }

    public function handle(User $user, array $data)
    {
        $organizationId = $user->selected_organization_id;
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
            'callback_url' => route('finance.payments.paystack.handle'),
        ];

        Log::info('Start here please');

        $paystackResponse = Paystack::getAuthorizationResponse($paystackRequest);

        Payment::create([
            'user_id' => $user->id,
            'organization_id' => $organizationId,
            'amount' => $amount,
            'gateway' => 'paystack',
            'status' => 'pending',
            'reference' => (string) Str::ulid(),
            'gateway_reference' => $paystackResponse['data']['reference'],
            'currency' => 'GHS',
            'description' => 'Wallet top up',
            'metadata' => [
                'wallet_id' => $data['wallet_id'],
                'request' => $paystackRequest,
                'response' => $paystackResponse,
            ],
        ]);

        return $paystackResponse['data']['authorization_url'];
    }
}
