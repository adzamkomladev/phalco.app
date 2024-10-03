<?php

namespace App\Tables\Voting\Agents;

use App\Models\OrganizationRole;
use App\Models\User;
use Hybridly\Refining\Filters\CallbackFilter;
use Hybridly\Refining\Sorts;
use Hybridly\Tables\Columns;
use Hybridly\Tables\Table;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as InternalBuilder;

final class AgentsTable extends Table
{
    protected string $model = User::class;

    protected function defineColumns(): array
    {
        return [
            Columns\TextColumn::make('id')->label('#')->visible(false),
            Columns\TextColumn::make('name')
                ->label('Name')
                ->transformValueUsing(fn (User $user) => $user->name)
                ->extra((fn (User $user) => [
                    'id' => $user->id,
                    'email' => $user->email,
                    'avatar' => $user->avatar,
                ])),
            Columns\TextColumn::make('polling_stations')->label('Polling Stations')
                ->transformValueUsing(fn (User $user) => $user->polling_stations_count ?? 0),
            Columns\TextColumn::make('added_on')->label('Added On')
                ->transformValueUsing(fn (User $user) => $user->organizationMemberships->first()->created_at->diffForHumans()),

        ];
    }

    protected function defineRefiners(): array
    {
        return [
            Sorts\Sort::make('id'),
            CallbackFilter::make(
                name: 'search',
                callback: function (InternalBuilder $builder, mixed $value, string $property) {
                    $builder->whereAny([
                        'first_name',
                        'last_name',
                        'email',
                        'phone',
                    ], 'ilike', "%{$value}%");
                }
            ),
        ];
    }

    protected function defineActions(): array
    {
        return [];
    }

    protected function defineQuery(): Builder
    {
        $selectedOrganizationId = auth()->user()->selected_organization_id;
        $role = OrganizationRole::where('organization_id', $selectedOrganizationId)
            ->where('name', 'agent')
            ->first();

        return $this->getModel()
            ->query()
            ->with('organizationMemberships')
            ->withCount('pollingStations')
            ->whereRelation('organizationMemberships', 'organization_id', $selectedOrganizationId)
            ->whereRelation('organizationMemberships', 'organization_role_id', $role?->id);
    }
}
