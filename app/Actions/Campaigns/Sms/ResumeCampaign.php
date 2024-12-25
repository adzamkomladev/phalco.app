<?php

namespace App\Actions\Campaigns\Sms;

use App\Models\Campaign;
use Lorisleiva\Actions\Concerns\AsAction;

class ResumeCampaign
{
    use AsAction;

    public function asController(int $id)
    {
        try {
            $this->handle(auth()->id(), $id);
            return back()->with('success', 'Campaign resumed.');
        } catch (\Throwable $th) {
            logger()->error('Failed to resume campaign with error: {error}', ['error' => $th->getMessage()]);
            return back()->with('error', 'Failed to resume campaign.');
        }
    }

    public function handle(int $userId, int $campaignId)
    {
        Campaign::find($campaignId)->updateStatus($userId, 'pending', 'Resumed campaign');

        ProcessCampaign::run($campaignId);

        // TODO: send notification
    }
}
