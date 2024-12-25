<?php

namespace App\Actions\Campaigns\Sms;

use App\Models\Campaign;
use Lorisleiva\Actions\Concerns\AsAction;

class PauseCampaign
{
    use AsAction;

    public function asController(int $id)
    {
        try {
            $this->handle(auth()->id(), $id);
            return back()->with('success', 'Campaign paused.');
        } catch (\Throwable $th) {
            logger()->error('Failed to pause campaign with error: {error}', ['error' => $th->getMessage()]);
            return back()->with('error', 'Failed to pause campaign.');
        }
    }


    public function handle(int $userId, int $campaignId)
    {
        Campaign::find($campaignId)->updateStatus($userId, 'paused', 'Paused by user');

        // TODO: send notification
    }
}
