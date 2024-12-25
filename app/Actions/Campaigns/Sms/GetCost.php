<?php

namespace App\Actions\Campaigns\Sms;

use App\Data\Campaigns\Sms\CostData;
use App\Models\Contact;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class GetCost
{
    use AsAction;

    public function rules(): array
    {
        return [
            'message' => ['required', 'string'],
            'audience_id' => ['required', 'integer', 'exists:audiences,id'],
        ];
    }

    public function asController(ActionRequest $request)
    {
        return response()->json($this->handle($request->input('audience_id'), $request->input('message')));
    }

    public function handle(int $audienceId, string $message): CostData
    {
        $smsCount = (int) GetSmsCount::run($message);
        $totalRecipients = Contact::where('audience_id', $audienceId)->count('id');
        $messageCost = $smsCount * (int) config('settings.sms.costPerMessage');
        $totalCost = $totalRecipients * $messageCost;

        return CostData::from([
            'smsCount' => $smsCount,
            'totalRecipients' => $totalRecipients,
            'messageCost' => $messageCost,
            'totalCost' => $totalCost,
        ]);
    }
}
