<?php

namespace App\Actions\Finance\Payments\Methods;

use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Http;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class Store
{
    use AsAction;

    public string $jobQueue = 'default';

    protected $networks = [
        'MTN' => 'MTN',
        'AirtelTigo' => 'AirtelTigo',
        'Vodafone' => 'Vodafone',
    ];

    public function rules()
    {
        return [
            'account_name' => ['required', 'string', 'max:100'],
            'account_number' => ['required', 'string', 'max:100'],
            'network_code' => ['required', 'string', 'max:50'],
            'channel_code' => ['required', 'string', 'max:50', 'in:mobile_money'],
        ];
    }

    public function asController(ActionRequest $request)
    {
        try {
            Store::dispatch($request->user()->id, $request->user()->selected_organization_id, $request->validated());

            return back()->with('success', 'Payment method created!');
        } catch (\Exception $e) {
            logger()->error('Initiate payment error', ['error' => $e->getMessage()]);

            return back()->with('error', $e->getMessage());
        }
    }

    public function asJob(int $userId, int $organizationId, array $data): void
    {
        try {
            $this->handle($userId, $organizationId, $data);
        } catch (\Exception $e) {
            logger()->error('Failed to create payment method', ['error' => $e->getMessage()]);
        }
    }

    public function handle(int $userId, int $organizationId, array $data)
    {
        $res = Http::withHeaders([
            'Authorization' => 'Bearer '.config('paystack.secretKey'),
            'Content-Type' => 'application/json',
        ])->post('https://api.paystack.co/transferrecipient', [
            'type' => $data['channel_code'],
            'name' => $data['account_name'],
            'account_number' => $data['account_number'],
            'bank_code' => $data['network_code'],
            'currency' => 'GHS',
        ]);

        if (! $res->successful() || ! $res->json()['status']) {
            logger()->error('Failed to create transfer recipient on paystack', [
                'response' => $res->json(),
            ]);

            return null;
        }

        $gatewayReference = $res->json()['data']['recipient_code'];

        $network = cache('payments.methods')
            ->firstWhere('code', $data['network_code'])
        ?? ['name' => $data['network_code']];

        return PaymentMethod::create([
            'user_id' => $userId,
            'organization_id' => $organizationId,
            'account_name' => $data['account_name'],
            'account_number' => $data['account_number'],
            'channel_code' => $data['channel_code'],
            'channel_name' => 'Mobile Money',
            'network_code' => $data['network_code'],
            'network_name' => $network['name'],
            'gateway' => 'paystack',
            'gateway_reference' => $gatewayReference,
            'currency' => 'GHS',
            'status' => 'active',
        ]);
    }
}
