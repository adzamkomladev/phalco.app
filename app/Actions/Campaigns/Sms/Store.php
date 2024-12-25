<?php

namespace App\Actions\Campaigns\Sms;

use App\Models\Audience;
use App\Models\Campaign;
use App\Models\CampaignActivity;
use App\Models\SmsSender;
use App\Models\User;
use Bavix\Wallet\Models\Wallet;
use Illuminate\Support\Facades\DB;
use Laravel\Octane\Facades\Octane;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Support\Str;


class Store
{
    use AsAction;

    public function rules(): array
    {
        return [
            'sender_id' => ['required', 'integer', 'exists:sms_senders,id'],
            'audience_id' => ['required', 'integer', 'exists:audiences,id'],
            'wallet_id' => ['required', 'integer'],
            'message' => ['required', 'string'],
            'scheduled_at' => ['nullable', 'datetime']
        ];
    }

    public function asController(ActionRequest $request)
    {
        try {
            $campaign = $this->handle($request->user(), $request->validated());

            return redirect()->route('campaigns.sms.show', ['id' => $campaign->id]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function handle(User $user, array $data)
    {
        [
            $wallet,
            $sender,
            $audience
        ] = Octane::concurrently([
            fn() => Wallet::find($data['wallet_id']),
            fn() => SmsSender::select(['id', 'sender'])->find($data['sender_id']),
            fn() => Audience::select(['id', 'name'])->find($data['audience_id'])
        ]);

        $cost = GetCost::run($data['audience_id'], $data['message']);

        if ($wallet->balanceInt < $cost->totalCost) {
            throw new \Exception('Insufficient wallet balance');
        }

        $campaign = $this->setupCampaign(
            $user,
            $sender,
            $audience,
            [
                'message' => $data['message'],
                'scheduled_at' => $data['scheduled_at'],
                'totalRecipients' => $cost->totalRecipients,
                'totalCost' => $cost->totalCost,
                'messageCost' => $cost->messageCost,
                'smsCount' => $cost->smsCount,
            ]
        );

        $transaction = $wallet->withdraw($cost->totalCost, [
            'campaign_id' => $campaign->id,
            'description' => 'SMS Campaign payment',
            'userId' => $user->id,
            'name' => $user->name,
            'avatar' => $user->avatar,
        ]);

        $campaign->update(['payment_reference' => $transaction->uuid]);

        ProcessCampaign::dispatch($campaign->id);

        return $campaign;
    }



    private function setupCampaign(User $user, SmsSender $sender, Audience $audience, array $data): Campaign
    {
        try {
            DB::beginTransaction();

            $campaign = Campaign::create([
                'type' => 'sms',
                'sender_id' => $sender->id,
                'audience_id' => $audience->id,
                'organization_id' => $user->selected_organization_id,
                'user_id' => $user->id,
                'code' => (string) Str::ulid(),
                'scheduled_at' => $data['scheduled_at'],
                'status' => 'initiated',
                'data' => [
                    'message' => $data['message'],
                    'recipients' => $data['totalRecipients'],
                    'sender' => $sender->sender,
                    'audience' => $audience->name
                ],
                'cost' => [
                    'total' => $data['totalCost'],
                    'sms_count' => $data['smsCount'],
                    'message_cost' => $data['messageCost']
                ],
            ]);

            CampaignActivity::create([
                'audience_id' => $audience->id,
                'status' => 'initiated',
                'user_id' => $user->id,
                'reason' => 'Initiate new campaign',
            ]);

            DB::commit();

            return $campaign;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
