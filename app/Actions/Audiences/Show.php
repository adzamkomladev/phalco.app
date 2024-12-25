<?php

namespace App\Actions\Audiences;

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
        ] = Octane::concurrently([fn () => Audience::find($id),
            fn () => 0,
            fn () => Contact::where('audience_id', $id)->count(),
        ]);

        $notifications = [];

        $contactsNotification = cache("audiences.{$id}.imports.notifications");
        if ($contactsNotification) {
            $notifications[] = $contactsNotification;
        }

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
            'notifications' => NotificationData::collect($notifications),
            'audience' => $audience,
            'contacts' => ContactsTable::make(['audienceId' => $id]),
        ];
    }
}
