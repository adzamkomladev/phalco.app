<?php

namespace App\Actions\Settings\Team;

use App\Data\Settings\Team\InvitationStatsChangeData;
use App\Data\Settings\Team\InvitationStatsData;
use App\Models\OrganizationInvitation;
use App\Models\OrganizationMembership;
use App\Tables\Team\MembersTable;
use Illuminate\Support\Facades\Cache;
use Laravel\Octane\Facades\Octane;
use Lorisleiva\Actions\Concerns\AsAction;

use function Hybridly\view;

class Index
{
    use AsAction;

    public function asController()
    {

        return view('settings.team.index', [
            'members' => MembersTable::make(),
            'stats' => $this->handle(request()->user()->currentOrganization->id),
        ]);
    }

    public function handle(int $organizationId)
    {
        [
            $totalMembers,
            $changeMembers,
            $totalInvites,
            $changeInvites,
            $totalRejections,
            $changeRejections
        ] = Octane::concurrently([
            fn () => $this->totalMembers($organizationId),
            fn () => $this->membershipChange($organizationId),
            fn () => $this->totalInvites($organizationId),
            fn () => $this->invitesChange($organizationId),
            fn () => $this->totalRejections($organizationId),
            fn () => $this->rejectionsChange($organizationId),
        ]);

        return InvitationStatsData::from([
            'totalMembers' => $totalMembers,
            'changeMembers' => InvitationStatsChangeData::from($changeMembers),
            'totalInvites' => $totalInvites,
            'changeInvites' => InvitationStatsChangeData::from($changeInvites),
            'totalRejections' => $totalRejections,
            'changeRejections' => InvitationStatsChangeData::from($changeRejections),
        ]);
    }

    protected function totalMembers(int $organizationId)
    {
        return Cache::store('octane')
            ->remember(
                'team.total.members',
                60 * 60,
                fn () => OrganizationMembership::active()->where('organization_id', $organizationId)->count()
            );
    }

    protected function membershipChange(int $organizationId)
    {
        return Cache::store('octane')
            ->remember(
                'team.change.members',
                60 * 60,
                function () use ($organizationId) {
                    $totalNew = OrganizationMembership::active()
                        ->where('organization_id', $organizationId)
                        ->where('created_at', '>=', now()->subWeek())
                        ->count();

                    $totalOld = OrganizationMembership::active()
                        ->where('organization_id', $organizationId)
                        ->where('created_at', '<', now()->subWeek())
                        ->count();

                    $totalOld = $totalOld === 0 ? 1 : $totalOld;

                    return ['total' => $totalNew, 'percentage' => ($totalNew / $totalOld) * 100];
                }
            );
    }

    protected function totalInvites(int $organizationId)
    {
        return Cache::store('octane')
            ->remember(
                'team.total.invites',
                60 * 60,
                fn () => OrganizationInvitation::where('organization_id', $organizationId)->count()
            );
    }

    protected function invitesChange(int $organizationId)
    {
        return Cache::store('octane')
            ->remember(
                'team.change.invites',
                60 * 60,
                function () use ($organizationId) {
                    $totalNew = OrganizationInvitation::where('organization_id', $organizationId)
                        ->where('created_at', '>=', now()->subWeek())
                        ->count();

                    $totalOld = OrganizationInvitation::where('organization_id', $organizationId)
                        ->where('created_at', '<', now()->subWeek())
                        ->count();

                    $totalOld = $totalOld === 0 ? 1 : $totalOld;

                    return ['total' => $totalNew, 'percentage' => ($totalNew / $totalOld) * 100];
                }
            );
    }

    protected function totalRejections(int $organizationId)
    {
        return Cache::store('octane')
            ->remember(
                'team.total.rejections',
                60 * 60,
                fn () => OrganizationInvitation::rejected()->where('organization_id', $organizationId)->count()
            );
    }

    protected function rejectionsChange(int $organizationId)
    {
        return Cache::store('octane')
            ->remember(
                'team.change.rejections',
                60 * 60,
                function () use ($organizationId) {
                    $totalNew = OrganizationInvitation::rejected()
                        ->where('organization_id', $organizationId)
                        ->where('created_at', '>=', now()->subWeek())
                        ->count();

                    $totalOld = OrganizationInvitation::rejected()
                        ->where('organization_id', $organizationId)
                        ->where('created_at', '<', now()->subWeek())
                        ->count();

                    $totalOld = $totalOld === 0 ? 1 : $totalOld;

                    return ['total' => $totalNew, 'percentage' => ($totalNew / $totalOld) * 100];
                }
            );
    }
}
