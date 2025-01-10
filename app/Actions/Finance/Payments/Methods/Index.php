<?php

namespace App\Actions\Finance\Payments\Methods;

use App\Data\Finance\NetworkData;
use App\Data\Finance\PaymentMethodData;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Http;
use Lorisleiva\Actions\Concerns\AsAction;

use function Hybridly\view;

class Index
{
    use AsAction;

    public function asController()
    {
        return view('finance.payments.methods.index', $this->handle(request()->user()->selected_organization_id))
            ->base('finance.index');
    }

    public function handle(int $organizationId)
    {
        $data = PaymentMethod::where('organization_id', $organizationId)->get();
        $networks = cache()
            ->flexible('payments.methods', [604800, 604900], function () {
                $response = Http::withHeaders([
                    'Authorization' => 'Bearer '.config('paystack.secretKey'),
                    'Content-Type' => 'application/json',
                ])->get('https://api.paystack.co/bank', ['country' => 'ghana']);

                $networks = cache('payments.methods');

                if ($response->successful() && $response->json()['status']) {
                    $networks = $response->json()['data'];
                } else {
                    return $networks;
                }

                return collect($networks)
                    ->filter(fn ($network) => $network['type'] == 'mobile_money');
            });

        return [
            'methods' => PaymentMethodData::collect($data),
            'networks' => NetworkData::collect($networks->values()),
        ];
    }
}
