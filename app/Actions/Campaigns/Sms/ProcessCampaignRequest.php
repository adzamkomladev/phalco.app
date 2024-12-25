<?php

namespace App\Actions\Campaigns\Sms;

use App\Models\CampaignRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ProcessCampaignRequest
{
    use AsAction;

    public string $jobQueue = 'campaigns';

    public function asJob(array $request, array $response): void
    {
        try {
            $this->handle($request, $response);
        } catch (\Exception $e) {
            logger()->error('Handle process campaign request error: {error}', ['error' => $e->getMessage()]);
        }
    }

    public function handle(array $request, array $response)
    {
        CampaignRequest::where('id', $request['id'])
            ->update([
                'status' => 'submitted',
                'external_reference' => $response['id']
            ]);
    }
}
