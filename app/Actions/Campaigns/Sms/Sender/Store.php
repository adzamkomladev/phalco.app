<?php

namespace App\Actions\Campaigns\Sms\Sender;

use App\Models\SmsSender;
use Illuminate\Support\Facades\Storage;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class Store
{
    use AsAction;

    public function rules(): array
    {
        return [
            'sender' => ['required', 'string'],
            'reason' => ['required', 'string'],
            'proof_docs_url' => ['required', 'string'],
        ];
    }

    public function asController(ActionRequest $request)
    {
        $this->handle($request->user()->id, $request->user()->selected_organization_id, $request->validated());

        return back()->with('success', 'Sender created successfully');
    }

    public function handle(int $userId, int $organizationId, array $data)
    {
        $data['proof_docs_url'] = app()->isProduction()
            ? Storage::url($data['proof_docs_url'])
            : asset("storage/{$data['proof_docs_url']}");

        SmsSender::create([
            'organization_id' => $organizationId,
            'user_id' => $userId,
            'sender' => $data['sender'],
            'reason' => $data['reason'],
            'proof_docs_url' => $data['proof_docs_url'],
            'status' => 'approved'
        ]);
    }
}
