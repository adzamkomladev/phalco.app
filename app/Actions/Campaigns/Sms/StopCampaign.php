<?php

namespace App\Actions\Campaigns\Sms;

use App\Models\Campaign;
use Lorisleiva\Actions\Concerns\AsAction;

class StopCampaign
{
    use AsAction;

    public function asController(int $id)
    {
        try {
            $this->handle(auth()->id(), $id);
            return back()->with('success', 'Campaign stopped.');
        } catch (\Throwable $th) {
            logger()->error('Failed to stop campaign with error: {error}', ['error' => $th->getMessage()]);
            return back()->with('error', 'Failed to stop campaign.');
        }
    }

    public function handle(int $userId, int $campaignId)
    {
        Campaign::find($campaignId)->updateStatus($userId, 'cancelled', 'Stopped campaign');

        // TODO: send notification
        // TODO: Start refund process
    }
}
