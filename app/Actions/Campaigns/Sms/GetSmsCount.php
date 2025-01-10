<?php

namespace App\Actions\Campaigns\Sms;

use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class GetSmsCount
{
    use AsAction;

    public function rules(): array
    {
        return [
            'message' => ['required', 'string'],
        ];
    }

    public function asController(ActionRequest $request)
    {
        $smsCount = $this->handle($request->input('message'));

        return response()->json(['smsCount' => $smsCount]);
    }

    public function handle(string $message): int
    {
        $messageLength = strlen(preg_replace('/\s+/', ' ', trim($message)));

        return $messageLength <= config('settings.sms.charactersPerMessage')
            ? 1
            : ceil($messageLength / config('settings.sms.charactersPerMessage'));
    }
}
