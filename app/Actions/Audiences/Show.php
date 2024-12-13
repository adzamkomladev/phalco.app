<?php

namespace App\Actions\Audiences;

use App\Data\Audiences\Show\CreatorData;
use App\Data\Audiences\Show\NotificationData;
use App\Data\MiniCardStatData;
use App\Models\Audience;
use App\Models\Contact;
use App\Tables\Audiences\ContactsTable;
use Laravel\Octane\Facades\Octane;
use Lorisleiva\Actions\Concerns\AsAction;

class Show
{
    use AsAction;

    public function asController(int $id)
    {
        return hybridly('audiences.show', $this->handle($id));
    }

    public function handle(int $id)
    {
        [
            $audience,
            $totalCampaigns,
            $totalContacts
        ] = Octane::concurrently([
            fn () => Audience::find($id),
            fn () => 0,
            fn () => Contact::where('audience_id', $id)->count(),
        ]);

        return [
            'stats' => MiniCardStatData::collect([
                [
                    'title' => 'Total Campaigns',
                    'value' => $totalCampaigns,
                ],
                [
                    'title' => 'Total contacts',
                    'value' => $totalContacts,
                ],
            ]),
            'notifications' => NotificationData::collect([
                [
                    'creator' => CreatorData::from([
                        'name' => 'John Doe',
                        'avatar' => 'https://i.pravatar.cc/300',
                    ]),
                    'title' => 'Contact uploads',
                    'type' => 'contacts',
                    'percentageCompleted' => 70,
                    'broadcastTopic' => 'audiences.1.contacts.import',
                    'createdAt' => now()->subDays(3),
                ],
                [
                    'creator' => CreatorData::from([
                        'name' => 'John Doe',
                        'avatar' => 'https://i.pravatar.cc/300',
                    ]),
                    'title' => 'Running campaign',
                    'type' => 'campaigns',
                    'percentageCompleted' => 20,
                    'broadcastTopic' => 'audiences.1.campaigns.5.running',
                    'createdAt' => now()->subDays(1),
                ],
            ]),
            'audience' => $audience,
            'contacts' => ContactsTable::make(['audienceId' => $id]),
        ];
    }
}
